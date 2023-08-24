<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TrHeaderPindahGudang;
use App\Models\TrDetailPindahGudang;
use App\Models\StInvent;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Session;

class PindahGudangController extends Controller
{
    public static function getKodePeriodeOperasional()
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);
        return $jsonx[0]['kode_periode'];
    }

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

    public function trHeaderPindahGudang()
    {
        $saldoAwal =  TrHeaderPindahGudang::all();
        $supplier = Supplier::all();

        $data['title'] = 'PENERIMAAN | PINDAH GUDANG';
        return view('transaction/penerimaan/trHeaderPindahGudang', $data, compact('saldoAwal','supplier'));
    }

    public function trHeaderPindahGudang_data(Request $request)
    {
        // $data = TrHeaderPindahGudang::query();
        $getNPO = DB::table('periode_operasional')
                        ->select('*')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);
        $data =  TrHeaderPindahGudang::leftJoin('mstr_supplier as ms', 'ms.kode_supp','=','tr_header_saldo_awal.supplier')
                                    ->where('tr_header_saldo_awal.kode_periode',$jsonx[0]['kode_periode'])
                                    ->get(['tr_header_saldo_awal.*','ms.nama_supp as ns']);

        return Datatables::of($data)
                ->setTotalRecords(100)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    
                    $btn = '<a href="'. url('trDetailPindahGudang').'/'.$data->id.'" class="edit btn btn-primary btn-sm">Detail</a>';
                    if(Auth::user()->level == "administrator"){
                    $btn .= '<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id.'" data-kode="'.$data->no_sppb.'" class="btn btn-danger btn-sm delStInvent" title="Delete">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                // ->toJson();
                ->make(true);
    }

    public function trHeaderPindahGudang_add(Request $request)
    {
        // dd($request->kode_periode);
        // exit();
        $getNPO = DB::table('periode_operasional')
                        ->select('*')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        if($request->tgl_sa < $jsonx[0]['awal_tgl'] || $request->tgl_sa > $jsonx[0]['akhir_tgl'])
        {
           return redirect()->route('trHeaderPindahGudang')->with('error', 'Tanggal tidak sesuai dengan tahun periode!'); 
        }
        
        $request->validate([
            'no_ref' => 'required|unique:tr_header_saldo_awal',
            'no_sppb' => 'required',
        ]);

        $trHeaderPindahGudang = new TrHeaderPindahGudang([
            'no_ref' => $request->no_ref,
            'no_sppb' => $request->no_sppb,
            'supplier' => $request->supplier,            
            'kd_area' => $request->kd_area,
            'kode_periode' => $request->kode_periode,
            'tgl_sa' => $request->tgl_sa,
            'keterangan' => $request->keterangan,
            'user_created' => Auth::user()->name
        ]);
        $trHeaderPindahGudang->save();
        return redirect()->route('trHeaderPindahGudang')->with('success', 'Tambah data sukses!');
    }

    public function trHeaderPindahGudangDestroy_del(Request $request)
    {
        $getDetSa =  TrDetailPindahGudang::where('id_head_sa','=',$request->del_id)->get();
        if (!$getDetSa->isEmpty()) 
        { 
            return back()->with('error',' Failed, Hapus data detail terlebih dahulu!');
        }else{
            TrHeaderPindahGudang::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');
        }

    }

    public function trDetailPindahGudang($id_header_saldo_awal)
    {
        // $getHeaderSa = TrHeaderPindahGudang::find($id_header_saldo_awal);
        $getHeaderSa = TrHeaderPindahGudang::leftJoin('mstr_kd_area as mkd', 'mkd.kode_area','=','tr_header_saldo_awal.kd_area')
                                    ->leftJoin('mstr_kd_area as mkd2', 'mkd2.kode_area','=','tr_header_saldo_awal.from_kd_area')
                                    ->leftJoin('mstr_supplier as ms', 'ms.kode_supp','=','tr_header_saldo_awal.supplier')        
                                    ->where('tr_header_saldo_awal.id','=',$id_header_saldo_awal)
                                    ->first(['tr_header_saldo_awal.*','mkd.nama_area as nmarea','mkd2.nama_area as nmarea2','ms.nama_supp as nmsupp']);   
        $stInvent = StInvent::all();
        // $stInvent = StInvent::where('id_head_sa','=',$request->del_id)->get();
        $getDetailSa = TrDetailPindahGudang::leftJoin('tr_invent_stock as tris', 'tris.kd_brg','=','tr_detail_saldo_awal.kd_brg')                                    
                                    ->where('tr_detail_saldo_awal.id_head_sa','=',$id_header_saldo_awal)
                                    ->get(['tr_detail_saldo_awal.*','tris.kd_brg as kdbrg','tris.ukuran as ukuran']);
 
        $data['title'] = 'Detail Pindah Gudang';
        return view('transaction/penerimaan/trDetailPindahGudang', $data, compact('getHeaderSa','stInvent','getDetailSa'));
        
    }

    public function trDetailPindahGudang_add(Request $request)
    {
        $request->validate([
            'kd_brg' => 'required',
        ]);

        // echo $request->total;
        // exit();

        $trDetailPindahGudang = new TrDetailPindahGudang([
            'id_head_sa' => $request->id_header_saldo_awal,
            'kd_brg' => $request->kd_brg,
            'part_numb' => $request->part_numb,
            'qty' => $request->qty,
            'uom' => $request->uom,
            'harga_satuan' => $request->harga_satuan,
            'total' => $request->total,
            'kode_periode' => $request->kode_periode,
            'tgl_det_sa' => $request->tgl_det_sa,
            'keterangan' => $request->keterangan,
            'user_created' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);        

        if (Auth::user()->username == null or Auth::user()->username == "") {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            $trDetailPindahGudang->save();
            return redirect()->route('trDetailPindahGudang',[$request->id_header_saldo_awal])->with('success', 'Tambah data sukses!');
        }
    }

    public function trDetailPindahGudang_del(Request $request)
    {
        $getDetSa =  TrDetailPindahGudang::where('id','=',$request->del_id)->get();
        if ($getDetSa->isEmpty()) 
        { 
            return back()->with('error',' Failed, data tidak ada!');
        }else{
            TrDetailPindahGudang::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');
        }

    }

    public function stInvSa_data(Request $request)
    {
        // $data = StInvent::query();
      $data = DB::table(DB::raw("(SELECT tr_invent_stock.*,temp_qty.qty as qty, mstr_jnsalat_merk.keterangan as ket FROM tr_invent_stock LEFT JOIN temp_qty ON tr_invent_stock.kd_brg = temp_qty.kd_brg
          LEFT JOIN mstr_jnsalat_merk ON tr_invent_stock.kel_brg = mstr_jnsalat_merk.kode_jnsAlatMerk) as tis"));
      // $data = StInvent::leftJoin('temp_qty as tq', 'tq.kd_brg','=','tr_invent_stock.kd_brg')
      //                               ->get(['tr_invent_stock.*','tq.qty as qty']);

        return Datatables::of($data)
                ->setTotalRecords(100)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    
                    $btn = '<a href="#" data-id="'.$data->id.'" 
                                        data-kdbrg="'.$data->kd_brg.'"
                                        data-kelbrg="'.$data->kel_brg.'"
                                        data-partnumb="'.$data->part_numb.'"
                                        data-uk="'.$data->ukuran.'"
                                        data-uom="'.$data->uom.'"
                                        data-merk="'.$data->merk.'"
                                        data-ket="'.$data->ket.'"
                                class="btn btn-primary btn-sm clickInv" title="pilih">PILIH</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                // ->toJson();
                ->make(true);
    }    

    public function showEdit($id)
    {
        // $detailSaldoAwal = TrDetailPindahGudang::find($id);
        $detailSaldoAwal = TrDetailPindahGudang::leftJoin('tr_invent_stock as tris', 'tris.kd_brg','=','tr_detail_saldo_awal.kd_brg')                                    
                                    ->where('tr_detail_saldo_awal.id','=',$id)
                                    ->get(['tr_detail_saldo_awal.*','tris.kd_brg as kdbrg','tris.ukuran as ukuran']);
        $html ='        
        <form class="form-horizontal" method="POST" action="'.route('trDetailPindahGudang.edit').'">
        '. csrf_field() .'
        <input type="hidden" value="'.$id.'" name="idM">
        <input type="hidden" value="'.$detailSaldoAwal[0]['id_head_sa'].'" name="id_head_sa">
        <div class="card-body">          
          <div class="row">            
            <div class="col-sm-2">
              <div class="form-group">
                <label>Kode Barang</label>
                  <input type="text" class="form-control" id="kd_brg" name="kd_brg" value="'.$detailSaldoAwal[0]['kd_brg'].'" readonly="readonly">        
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Ukuran</label>
                  <input type="text" class="form-control" id="ukuran" name="ukuran" value="'.$detailSaldoAwal[0]['ukuran'].'" readonly="readonly">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>Nama Brg</label>                
                  <input type="text" class="form-control" name="part_numb" value="'.$detailSaldoAwal[0]['part_numb'].'" readonly="readonly">                
              </div>
            </div>            

          </div>
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label>Jumlah</label>                
                  <input type="text" class="form-control" name="qty" id="qty-m" value="'.$detailSaldoAwal[0]['qty'].'">                
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                <label>Satuan</label>                
                  <input type="text" class="form-control" name="uom" value="'.$detailSaldoAwal[0]['uom'].'" readonly="readonly">                
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Harga Satuan</label>                
                  <input type="text" class="form-control" name="harga_satuan" id="harga_satuan-m" value="'.$detailSaldoAwal[0]['harga_satuan'].'">                
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Total</label>                
                  <input type="text" class="form-control" name="total" id="total-m" value="'.$detailSaldoAwal[0]['total'].'" readonly="readonly">                
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

    public function trDetailPindahGudang_edit(Request $request)
    {
        TrDetailPindahGudang::where('id', $request->idM)
                  ->update(['qty' => $request->qty,
                            'harga_satuan' => $request->harga_satuan,
                            'total' => $request->total
                            ]);
        return redirect()->route('trDetailPindahGudang',[$request->id_head_sa])->with('success', 'Edit data sukses!');
    }

    // public function stInvent_del(Request $request)
    // {
    //     DB::beginTransaction();
    //     try{
    //         StInvent::where('id', $request->del_id)->delete();
    //         DB::commit();
    //         return back()->with('success',' Data deleted successfully');
    //     }catch(\Exception $e){
    //         DB::rollback();
    //         return back()->with('error',' There is some problem, please try again or call your admin!');
    //     }
    // }

}
