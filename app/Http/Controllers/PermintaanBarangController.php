<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TrHeaderPb;
use App\Models\TrDetailPb;
use App\Models\StInvent;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Session;

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
        $kp = substr($jsonx[0]['kode_periode'], 3, 2);
        $romawi = Helper::angkaKeRomawi($kp);
        $newNo1 = "BTJ-ORD"."/".$romawi."/".$jsonx[0]['tahun_periode'];
        if($getLastNo->count() > 0) {
            $nourut = substr($jsonz[0]['no_pb'], 3, 1);
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
        $data = TrHeaderPb::query();
        // $data =  TrHeaderPb::leftJoin('mstr_supplier as ms', 'ms.kode_supp','=','tr_header_saldo_awal.supplier')
        //                             ->get(['tr_header_saldo_awal.*','ms.nama_supp as ns']);

        return Datatables::of($data)
                ->setTotalRecords(100)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    
                    $btn = '<a href="'. url('trDetailPb').'/'.$data->id.'" class="edit btn btn-primary btn-sm">Detail</a>';
                    if(Auth::user()->level == "administrator"){
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
        return redirect()->route('trHeaderPb')->with('success', 'Tambah data sukses!');
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
                                    ->where('tr_detail_pb.id_header_pb','=',$id_header_pb)
                                    ->get(['tr_detail_pb.*','tris.kd_brg as kdbrg','tris.ukuran as ukuran']);
 
        $data['title'] = 'Detail Permintaan Barang';
        return view('transaction/trDetailPb', $data, compact('getHeaderPb','stInvent','getDetailPb'));
        
    }

    public function trDetailPb_add(Request $request)
    {
        $request->validate([
            'kd_brg' => 'required',
        ]);

        $gLock = DB::table('temp_qty')
                        ->select('lock_pb')->where('kd_brg', $request->kd_brg)
                        ->get();
        $jsLock = json_decode($gLock, true);

        if($jsLock[0]['lock_pb'] == 1){
            return back()->with('error',' Failed, Stock masih ada!');
        }
        exit();
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

}
