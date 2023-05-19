<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TrHeaderSaldoAwal;
use App\Models\TrDetailSaldoAwal;
use App\Models\StInvent;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Session;

class SaldoAwalController extends Controller
{
    public static function getNewNoRef($kd_area)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $getLastNo = DB::table('tr_header_saldo_awal')
                        ->select('no_ref')
                        ->where('kode_periode','=',$jsonx[0]['kode_periode'])
                        ->where('kd_area','=',$kd_area)
                        ->orderBy('no_ref','desc')
                        ->get();        

        $jsonz = json_decode($getLastNo, true);
        $newNo1 = $jsonx[0]['kode_periode']."/";
        if($getLastNo->count() > 0) {
            $nourut = substr($jsonz[0]['no_ref'], 13, 4);
            $nourut++;            
            $newNo2 = sprintf("%04s", $nourut) ;
            return $newNo1.$newNo2;
        }else{            
            $newNo3 = '0001';
            return $newNo1.$newNo3;
        }        
    }

    public static function getNewNoSppb($kd_area)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $getLastNo = DB::table('tr_header_saldo_awal')
                        ->select('no_sppb')
                        ->where('kode_periode','=',$jsonx[0]['kode_periode'])
                        ->where('kd_area','=',$kd_area)
                        ->orderBy('no_sppb','desc')
                        ->get();        

        $jsonz = json_decode($getLastNo, true);
        $newNo1 = $jsonx[0]['kode_periode'];
        if($getLastNo->count() > 0) {
            $nourut = substr($jsonz[0]['no_sppb'],  7, 4);
            $nourut++;            
            $newNo2 = sprintf("%04s", $nourut) ;
            return $newNo1.$newNo2;
        }else{            
            $newNo3 = '0001';
            return $newNo1.$newNo3;
        }        
    }

    public function trHeaderSaldoAwal()
    {
        $saldoAwal =  TrHeaderSaldoAwal::all();
        $supplier = Supplier::all();

        $data['title'] = 'Saldo Awal';
        return view('transaction/penerimaan/trHeaderSaldoAwal', $data, compact('saldoAwal','supplier'));
    }

    public function trHeaderSaldoAwal_data(Request $request)
    {
        // $data = TrHeaderSaldoAwal::query();
        $data =  TrHeaderSaldoAwal::leftJoin('mstr_supplier as ms', 'ms.kode_supp','=','tr_header_saldo_awal.supplier')
                                    ->get(['tr_header_saldo_awal.*','ms.nama_supp as ns']);

        return Datatables::of($data)
                ->setTotalRecords(100)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    
                    $btn = '<a href="'. url('trDetailSaldoAwal').'/'.$data->id.'" class="edit btn btn-primary btn-sm">Detail</a>';
                    if(Auth::user()->level == "administrator"){
                    $btn .= '<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id.'" data-kode="'.$data->no_sppb.'" class="btn btn-danger btn-sm delStInvent" title="Delete">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                // ->toJson();
                ->make(true);
    }

    public function trHeaderSaldoAwal_add(Request $request)
    {
        // dd($request->kode_periode);
        // exit();
        $request->validate([
            'no_ref' => 'required|unique:tr_header_saldo_awal',
            'no_sppb' => 'required',
        ]);

        $trHeaderSaldoAwal = new TrHeaderSaldoAwal([
            'no_ref' => $request->no_ref,
            'no_sppb' => $request->no_sppb,
            'supplier' => $request->supplier,            
            'kd_area' => $request->kd_area,
            'kode_periode' => $request->kode_periode,
            'tgl_sa' => $request->tgl_sa,            
            'user_created' => Auth::user()->name
        ]);
        $trHeaderSaldoAwal->save();
        return redirect()->route('trHeaderSaldoAwal')->with('success', 'Tambah data sukses!');
    }

    public function trDetailSaldoAwal($id_header_saldo_awal)
    {
        $getHeaderSa = TrHeaderSaldoAwal::find($id_header_saldo_awal);     
        $stInvent = StInvent::all();
        $getDetailSa = TrDetailSaldoAwal::leftJoin('tr_invent_stock as tris', 'tris.kd_brg','=','tr_detail_saldo_awal.kd_brg')                                    
                                    ->where('tr_detail_saldo_awal.id','=',$id_header_saldo_awal)
                                    ->get(['tr_detail_saldo_awal.*','tris.kd_brg as kdbrg','tris.ukuran as ukuran']);
 
        $data['title'] = 'Detail Saldo Awal';
        return view('transaction/penerimaan/trDetailSaldoAwal', $data, compact('getHeaderSa','stInvent','getDetailSa'));
        
    }

    public function trDetailSaldoAwal_add(Request $request)
    {
        $request->validate([
            'kd_brg' => 'required',
        ]);

        // echo $request->total;
        // exit();

        $trDetailSaldoAwal = new TrDetailSaldoAwal([
            'id_head_sa' => $request->id_header_saldo_awal,
            'kd_brg' => $request->kd_brg,
            'part_numb' => $request->part_numb,
            'qty' => $request->qty,
            'uom' => $request->uom,
            'harga_satuan' => $request->harga_satuan,
            'total' => $request->total,
            'tgl_det_sa' => $request->tgl_det_sa,            
            'user_created' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);        

        if (Auth::user()->username == null or Auth::user()->username == "") {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            $trDetailSaldoAwal->save();
            return redirect()->route('trDetailSaldoAwal',[$request->id_header_saldo_awal])->with('success', 'Tambah data sukses!');
        }
    }

    public function showEdit($id)
    {                                                 
        $stcInvent = StInvent::find($id);
        $gabJnsAlatMerk = GabJnsAlatMerk::all();
        $merkBrg = MerkBrg::all();
        $list_kel_brg['']='-- Kel Brg --';
        $list_merk['']='-- Merk --';
        foreach ($gabJnsAlatMerk as $row) 
        {
            $list_kel_brg[$row->kode_jnsAlatMerk] = $row->kode_jnsAlatMerk;  
        }

        foreach ($merkBrg as $row) 
        {
            $list_merk[$row->kode_merk_b] = $row->kode_merk_b;  
        }

        $html ='
        
        <form class="form-horizontal" method="POST" action="'.route('stInvent.edit').'">
        '. csrf_field() .'
        <input type="hidden" value="'.$id.'" name="idM">
        <div class="card-body">          
          <div class="row">            
            <div class="col-sm-2">
              <div class="form-group">
                <label>Kel Brg</label>
                  <input type="text" class="form-control" id="kd_brg" name="kd_brg" value="'.$stcInvent->kel_brg.'" readonly="readonly">        
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Kd Brg</label>
                  <input type="text" class="form-control" id="kd_brg" name="kd_brg" value="'.$stcInvent->kd_brg.'" readonly="readonly">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>Nama Brg</label>                
                  <input type="text" class="form-control" name="part_numb" value="'.$stcInvent->part_numb.'">                
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Ukuran</label>                
                  <input type="text" class="form-control" name="ukuran" value="'.$stcInvent->ukuran.'">                
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                <label>UOM</label>                
                  <input type="text" class="form-control" name="uom" value="'.$stcInvent->uom.'">                
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label>Merk</label>                  
                  '. \Form::select('merk',$list_merk,$stcInvent->merk, $attributes = array('class'=>'form-control select2','id'=>'merk')) .'                 
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Status</label>                
                  <input type="text" class="form-control" name="status" value="'.$stcInvent->status.'">                
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button class="btn btn-success">Simpan</button>
        </div>
        </form>';
        

        $response['html'] = $html; 
        return response()->json($response);

    }

    public function stInvent_edit(Request $request)
    {
        StInvent::where('id', $request->idM)
                  ->update(['part_numb' => $request->part_numb,
                            'ukuran' => $request->ukuran,
                            'uom' => $request->uom,
                            'merk' => $request->merk,
                            'status' => $request->status
                            ]);
        return redirect()->route('stInvent')->with('success', 'Edit data sukses!');
    }

    public function stInvent_del(Request $request)
    {
        DB::beginTransaction();
        try{
            StInvent::where('id', $request->del_id)->delete();
            DB::commit();
            return back()->with('success',' Data deleted successfully');
        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error',' There is some problem, please try again or call your admin!');
        }
    }

}
