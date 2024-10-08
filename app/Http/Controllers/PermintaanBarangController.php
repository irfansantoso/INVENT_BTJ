<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TrHeaderPb;
use App\Models\TrDetailPb;
use App\Models\StInvent;
use App\Exports\ExportPb;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Session;
use PDF;

class PermintaanBarangController extends Controller
{
    public static function getNewNoRef($kd_area)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('tahun_periode','kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $getLastNo = DB::table('tr_header_pb')
                        ->select('no_pb')
                        ->where('kode_periode','=',$jsonx[0]['kode_periode'])
                        ->where('kd_area','=',$kd_area)
                        ->orderBy('no_pb','desc')
                        ->get();

        $jsonz = json_decode($getLastNo, true);
        // $kp = substr($jsonx[0]['kode_periode'], 3, 2);
        // $romawi = Helper::angkaKeRomawi($kp);
        $kp = (int)substr($jsonx[0]['kode_periode'], 2, 2); // extracts '09' or '10'
        $romawi = Helper::angkaKeRomawi($kp);
        $newNo1 = "BTJ-ORD"."/".$romawi."/".$jsonx[0]['tahun_periode'];
        if($getLastNo->count() > 0) {
            $nourut = substr($jsonz[0]['no_pb'], 0, 4);
            $nourut++;            
            $newNo2 = sprintf("%04s", $nourut)."/";
            return $newNo2.$newNo1;
        }else{            
            $newNo3 = '0001'."/";
            return $newNo3.$newNo1;
        }        
    }

    public function trHeaderPb()
    {
        $permintaanBarang =  TrHeaderPb::all();        

        $data['title'] = 'PERMINTAAN BARANG';
        return view('transaction/trHeaderPb', $data, compact('permintaanBarang'));
    }

    public function trHeaderPb_data(Request $request)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('tahun_periode','kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $data = DB::table('tr_header_pb')
                        ->select('*')
                        ->where('kode_periode','=',$jsonx[0]['kode_periode'])
                        ->orderBy('no_pb','desc')
                        ->get();
        // $data = TrHeaderPb::query();


        return Datatables::of($data)
                ->setTotalRecords(100)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    
                    $btn = '<a href="'. url('trDetailPb').'/'.$data->id.'" class="edit btn btn-primary btn-sm">Detail</a>';
                    if(Auth::user()->level == "administrator"){
                    $btn .= '<a href="#" data-toggle="modal" data-target="#modal-edit" data-id="'.$data->id.'" data-kode="'.$data->no_pb.'" class="btn btn-dark btn-sm editHeadPb" title="Edit">Edit</a>';
                    $btn .= '<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id.'" data-kode="'.$data->no_pb.'" class="btn btn-danger btn-sm delStInvent" title="Delete">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                // ->toJson();
                ->make(true);
    }

    public function trHeaderPb_add(Request $request)
    {
        // dd($request->kode_periode);
        // exit();
        $getNPO = DB::table('periode_operasional')
                        ->select('*')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        if($request->tgl_pb < $jsonx[0]['awal_tgl'] || $request->tgl_pb > $jsonx[0]['akhir_tgl'])
        {
           return redirect()->route('trHeaderPb')->with('error', 'Tanggal tidak sesuai dengan tahun periode!'); 
        }
        
        $request->validate([
            'no_pb' => 'required|unique:tr_header_pb',
        ]);

        $trHeaderPb = new TrHeaderPb([
            'no_pb' => $request->no_pb,
            'kd_area' => $request->kd_area,
            'kd_unit' => $request->kd_unit,
            'kd_area' => $request->kd_area,
            'status_pb' => $request->status_pb,
            'kepada' => $request->kepada,
            'camp_manager' => $request->camp_manager,
            'kepala_gudang' => $request->kepala_gudang,
            'kepala_mekanik' => $request->kepala_mekanik,
            'mekanik' => $request->mekanik,
            'kode_periode' => $request->kode_periode,
            'tgl_pb' => $request->tgl_pb,            
            'user_created' => Auth::user()->name
        ]);        

        $trHeaderPb->save();
        $getIdHead = DB::table('tr_header_pb')
                        ->select('*')->where('no_pb',$request->no_pb)
                        ->get();
        $jdIdHead = json_decode($getIdHead, true);
        return redirect()->route('trDetailPb',$jdIdHead[0]['id'])->with('success', 'Tambah data header sukses!');
    }

    public function showEditHead($id)
    {        
        $headerPb = TrHeaderPb::where('id','=',$id)
                                    ->get(['*']);

        $html ='        
        <form class="form-horizontal" method="POST" action="'.route('trHeaderPb.edit').'">
        '. csrf_field() .'
        <input type="hidden" value="'.$id.'" name="idM">
        <div class="card-body">
          <div class="row">            
            <div class="col-sm-4">
              <div class="form-group">
                <label>No PB</label>
                  <input type="text" class="form-control" id="" name="" value="'.$headerPb[0]['no_pb'].'" readonly="readonly">        
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Tanggal</label>
                  <input type="text" class="form-control" name="tgl_pb" value="'.$headerPb[0]['tgl_pb'].'" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
              </div>
            </div>
                       
          </div>

          <div class="row">            
            <div class="col-sm-4">
              <div class="form-group">
                <label>Kode Unit</label>
                  <input type="text" class="form-control" id="kd_unit" name="kd_unit" value="'.$headerPb[0]['kd_unit'].'">        
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Status</label>
                  <input type="text" class="form-control" id="status_pb" name="status_pb" value="'.$headerPb[0]['status_pb'].'">
              </div>
            </div>
                       
          </div>

          <div class="row">            
            <div class="col-sm-4">
              <div class="form-group">
                <label>Camp Manager</label>
                  <input type="text" class="form-control" id="camp_manager" name="camp_manager" value="'.$headerPb[0]['camp_manager'].'">        
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Kepala Gudang</label>
                  <input type="text" class="form-control" id="kepala_gudang" name="kepala_gudang" value="'.$headerPb[0]['kepala_gudang'].'">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Kepala Mekanik</label>
                  <input type="text" class="form-control" id="kepala_mekanik" name="kepala_mekanik" value="'.$headerPb[0]['kepala_mekanik'].'">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Mekanik</label>
                  <input type="text" class="form-control" id="mekanik" name="mekanik" value="'.$headerPb[0]['mekanik'].'">
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

    public function trHeaderPb_edit(Request $request)
    {
        TrHeaderPb::where('id', $request->idM)
                  ->update(['tgl_pb' => $request->tgl_pb,
                            'kd_unit' => $request->kd_unit,
                            'status_pb' => $request->status_pb,
                            'camp_manager' => $request->camp_manager,
                            'kepala_gudang' => $request->kepala_gudang,
                            'kepala_mekanik' => $request->kepala_mekanik,
                            'mekanik' => $request->mekanik,
                            'updated_at' => date('Y-m-d H:i:s')
                            ]);
        return redirect()->route('trHeaderPb')->with('success', 'Edit data sukses!');
        // return back()->with('success',' Edit Data Header successfully');
    }

    public function trHeaderPbDestroy_del(Request $request)
    {
        $getDetSa =  TrDetailPb::where('id_head_pb','=',$request->del_id)->get();
        if (!$getDetSa->isEmpty()) 
        { 
            return back()->with('error',' Failed, Hapus data detail terlebih dahulu!');
        }else{
            TrHeaderPb::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');
        }

    }  

    public function trDetailPb($id_header_pb)
    {
        $getHeaderPb = TrHeaderPb::find($id_header_pb);
        $stInvent = StInvent::all();
        // $stInvent = StInvent::where('id_head_pb','=',$request->del_id)->get();
        $getDetailPb = TrDetailPb::leftJoin('tr_invent_stock as tris', 'tris.kd_brg','=','tr_detail_pb.kd_brg')   
                                    ->leftJoin('temp_qty as tq', 'tq.kd_brg','=','tr_detail_pb.kd_brg')
                                    ->where('tr_detail_pb.id_head_pb','=',$id_header_pb)
                                    ->get(['tr_detail_pb.*','tris.kd_brg as kdbrg','tris.ukuran as ukuran','tq.qty as jumQty']);
 
        $data['title'] = 'Detail Permintaan Barang';
        return view('transaction/trDetailPb', $data, compact('getHeaderPb','stInvent','getDetailPb'));
        
    }

    public function trDetailPb_add(Request $request)
    {
        $request->validate([
            'kd_brg' => 'required',
        ]);

        // if (DB::table('temp_qty')->where('kd_brg', $request->kd_brg)->exists()) {
        //     $gLock = DB::table('temp_qty')
        //                     ->select('lock_pb')->where('kd_brg', $request->kd_brg)
        //                     ->get();
        //     $jsLock = json_decode($gLock, true);

        //     if($jsLock[0]['lock_pb'] == 1){
        //         return back()->with('error',' Failed, Stock masih ada!');
        //     }
        // }

        $trDetailPb = new TrDetailPb([
            'id_head_pb' => $request->id_header_pb,
            'kd_brg' => $request->kd_brg,
            'part_numb' => $request->part_numb,
            'merk' => $request->merk,
            'last_stock' => $request->last_stock,
            'qty' => $request->qty,
            'uom' => $request->uom,
            'kode_periode' => $request->kode_periode,
            'tgl_det_pb' => $request->tgl_det_pb,
            'user_created' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);        

        if (Auth::user()->username == null or Auth::user()->username == "") {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            $trDetailPb->save();
            return redirect()->route('trDetailPb',[$request->id_header_pb])->with('success', 'Tambah data sukses!');
        }
    }

    public function trDetailPb_edit(Request $request)
    {

        TrDetailPb::where('id', $request->id)
                  ->update([
                            'qty' => $request->qty,
                            'user_created' => Auth::user()->name,
                            'updated_at' => date('Y-m-d H:i:s'),
                            ]);
        // return redirect()->route('trDetailReturPemakaian',[$request->id_head_retur_pemakaian])->with('success', 'Ubah data sukses!');
                  return back()->with('success',' Ubah data successfully');

    }

    public function trDetailPb_del(Request $request)
    {
        $getDetPb =  TrDetailPb::where('id','=',$request->del_id)->get();
        if ($getDetPb->isEmpty()) 
        { 
            return back()->with('error',' Failed, data tidak ada!');
        }else{
            TrDetailPb::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');
        }

    }

    public function stInvPb_data(Request $request)
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
                                        data-laststock="'.$data->qty.'"
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

    public function printPb_rpt($id_header_pb)
    { 
        // $fileNm = "BUKTI PERMINTAAN BARANG.xlsx";
        //     return Excel::download(new ExportPb($id), $fileNm);
        $getHeaderPb = TrHeaderPb::find($id_header_pb);
        $getDetailPb = TrDetailPb::leftJoin('tr_invent_stock as tris', 'tris.kd_brg','=','tr_detail_pb.kd_brg')   
                                    ->leftJoin('mstr_jnsalat_merk_2 as mjam', 'mjam.kode_jnsAlatMerk','=','tris.kel_brg')
                                    ->leftJoin('temp_qty as tq', 'tq.kd_brg','=','tr_detail_pb.kd_brg')
                                    ->where('tr_detail_pb.id_head_pb','=',$id_header_pb)
                                    ->get(['tr_detail_pb.*','tris.kd_brg as kdbrg','tris.ukuran as ukuran','mjam.keterangan as ketjnsalat','tq.qty as jumQty']);

        $pdf = PDF::loadView('reporting/rpt_printPb',['getHeaderPb' => $getHeaderPb,'getDetailPb' => $getDetailPb]);
        return $pdf->download('BUKTI PERMINTAAN BARANG_'.date('Y-m-d_H-i-s').'.pdf');
    }

}
