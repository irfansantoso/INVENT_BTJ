<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TrHeaderReturPemakaian;
use App\Models\TrDetailReturPemakaian;
use App\Models\StInvent;
use App\Models\StsPemakaian;
use App\Models\Lokasi;
use App\Models\FixedAsset;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Session;

class ReturPemakaianController extends Controller
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

        $getLastNo = DB::table('tr_header_retur_pemakaian')
                        ->select('no_ref')
                        ->where('kode_periode','=',$jsonx[0]['kode_periode'])
                        ->where('kd_area','=',$kd_area)
                        ->orderBy('no_ref','desc')
                        ->get();        

        $jsonz = json_decode($getLastNo, true);
        $newNo1 = $jsonx[0]['kode_periode']."/";
        if($getLastNo->count() > 0) {
            $nourut = substr($jsonz[0]['no_ref'], 11, 4);
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

        $getLastNo = DB::table('tr_header_retur_pemakaian')
                        ->select('retur_p')
                        ->where('kode_periode','=',$jsonx[0]['kode_periode'])
                        ->where('kd_area','=',$kd_area)
                        ->orderBy('retur_p','desc')
                        ->get();        

        $jsonz = json_decode($getLastNo, true);
        $newNo1 = $jsonx[0]['kode_periode']."/";
        if($getLastNo->count() > 0) {
            $nourut = substr($jsonz[0]['retur_p'],  14, 4);
            $nourut++;            
            $newNo2 = sprintf("%04s", $nourut) ;
            return $newNo1.$newNo2;
        }else{            
            $newNo3 = '0001';
            return $newNo1.$newNo3;
        }        
    }

    public function trHeaderReturPemakaian()
    {
        $saldoAwal =  TrHeaderReturPemakaian::all();
        $supplier = Supplier::all();

        $data['title'] = 'PENERIMAAN | RETUR PEMAKAIAN';
        return view('transaction/penerimaan/trHeaderReturPemakaian', $data, compact('saldoAwal','supplier'));
    }

    public function trHeaderReturPemakaian_data(Request $request)
    {
        // $data = TrHeaderReturPemakaian::query();
        // $data =  TrHeaderReturPemakaian::leftJoin('mstr_supplier as ms', 'ms.kode_supp','=','tr_header_saldo_awal.supplier')
        //                             ->get(['tr_header_saldo_awal.*','ms.nama_supp as ns']);
        $getNPO = DB::table('periode_operasional')
                        ->select('*')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $data = DB::table(DB::raw("(SELECT tr_header_retur_pemakaian.*, mka.nama_area as nmarea FROM tr_header_retur_pemakaian LEFT JOIN mstr_kd_area as mka ON tr_header_retur_pemakaian.kd_area = mka.kode_area WHERE tr_header_retur_pemakaian.kode_periode = ".$jsonx[0]['kode_periode'].") as tis"));                                    

        return Datatables::of($data)
                ->setTotalRecords(100)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    
                    $btn = '<a href="'. url('trDetailReturPemakaian').'/'.$data->id.'" class="edit btn btn-primary btn-sm">Detail</a>';
                    if(Auth::user()->level == "administrator"){
                    $btn .= '<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id.'" data-sppb="'.$data->retur_p.'" class="btn btn-danger btn-sm delHeadReturPemakaian" title="Delete">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                // ->toJson();
                ->make(true);
    }

    public function trHeaderReturPemakaian_add(Request $request)
    {
        // dd($request->kode_periode);
        // exit();
        $getNPO = DB::table('periode_operasional')
                        ->select('*')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        if($request->tgl_retur < $jsonx[0]['awal_tgl'] || $request->tgl_retur > $jsonx[0]['akhir_tgl'])
        {
            return back()
                    ->withInput()
                    ->with('error','Tanggal tidak sesuai dengan tahun periode!');
        }

        $request->validate([
            'no_ref' => 'required|unique:tr_header_retur_pemakaian',
            'retur_p' => 'required',
        ]);

        $trHeaderReturPemakaian = new TrHeaderReturPemakaian([
            'no_ref' => $request->no_ref,
            'retur_p' => $request->retur_p,
            'supplier' => $request->supplier,            
            'kd_area' => $request->kd_area,
            'kode_periode' => $request->kode_periode,
            'tgl_retur' => $request->tgl_retur,
            'keterangan' => $request->keterangan,
            'user_created' => Auth::user()->name
        ]);
        $trHeaderReturPemakaian->save();
        return redirect()->route('trHeaderReturPemakaian')->with('success', 'Tambah data sukses!');
    }

    public function trHeaderReturPemakaianDestroy_del(Request $request)
    {

        $getDetReturPemakaian = TrDetailReturPemakaian::where('id_head_retur_pemakaian','=',$request->del_id)->get();
        if (!$getDetReturPemakaian->isEmpty()) 
        { 
            return back()->with('error',' Failed, Hapus data detailnya terlebih dahulu!');
        }else{
            TrHeaderReturPemakaian::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');
        }
    }

    public function trDetailReturPemakaian($id_head_retur_pemakaian)
    {
        // $getHeaderReturPemakaian = TrHeaderReturPemakaian::find($id_head_retur_pemakaian);
        $getHeaderReturPemakaian = TrHeaderReturPemakaian::leftJoin('mstr_kd_area as mkd', 'mkd.kode_area','=','tr_header_retur_pemakaian.kd_area')
                                    ->where('tr_header_retur_pemakaian.id','=',$id_head_retur_pemakaian)
                                    ->first(['tr_header_retur_pemakaian.*','mkd.nama_area as nmarea']);

        $stInvent = StInvent::all();
        $getDetailReturPemakaian = TrDetailReturPemakaian::leftJoin('tr_invent_stock as tris', 'tris.kd_brg','=','tr_detail_retur_pemakaian.kd_brg')
                                    ->where('tr_detail_retur_pemakaian.id_head_retur_pemakaian','=',$id_head_retur_pemakaian)
                                    ->get(['tr_detail_retur_pemakaian.*','tris.kd_brg as kdbrg','tris.part_numb as partnumb','tris.merk as merk','tris.ukuran as ukuran']);
 
        $data['title'] = 'Detail Retur Pemakaian';
        return view('transaction/penerimaan/trDetailReturPemakaian', $data, compact('getHeaderReturPemakaian','stInvent','getDetailReturPemakaian'));
        
    }

    public function trDetailReturPemakaian_add(Request $request)
    {

        $request->validate([
            'kd_brg' => 'required',
        ]);

        $trDetailReturPemakaian = new trDetailReturPemakaian([
            'id_head_retur_pemakaian' => $request->id_head_retur_pemakaian,
            'kd_brg' => $request->kd_brg,
            'part_numb' => $request->part_numb,
            'qty' => $request->qty,
            'uom' => $request->uom,
            'hrg_satuan' => $request->hrg_satuan,
            'total' => $request->total,
            'hrg_beli' => $request->hrg_beli,
            'kode_periode' => $request->kode_periode,
            'tgl_det_retur_pemakaian' => $request->tgl_det_retur_pemakaian,
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
            $trDetailReturPemakaian->save();
            return redirect()->route('trDetailReturPemakaian',[$request->id_head_retur_pemakaian])->with('success', 'Tambah data sukses!');
        }
    }

    public function trDetailReturPemakaian_edit(Request $request)
    {

        trDetailReturPemakaian::where('id', $request->id)
                  ->update([
                            'kd_brg' => $request->kd_brg,
                            'part_numb' => $request->part_numb,
                            'qty' => $request->qty,
                            'uom' => $request->uom,
                            'hrg_satuan' => $request->hrg_satuan,
                            'total' => $request->total,
                            'hrg_beli' => $request->hrg_beli,
                            'kode_periode' => $request->kode_periode,
                            'tgl_det_retur_pemakaian' => $request->tgl_det_retur_pemakaian,
                            'keterangan' => $request->keterangan,
                            'user_created' => Auth::user()->name,
                            'updated_at' => date('Y-m-d H:i:s'),
                            ]);
        // return redirect()->route('trDetailReturPemakaian',[$request->id_head_retur_pemakaian])->with('success', 'Ubah data sukses!');
                  return back()->with('success',' Ubah data successfully');

    }

    public function trDetailReturPemakaian_del(Request $request)
    {
        $getDetReturPemakaian =  TrDetailReturPemakaian::where('id','=',$request->del_id)->get();
        if ($getDetReturPemakaian->isEmpty()) 
        { 
            return back()->with('error',' Failed, data tidak ada!');
        }else{
            TrDetailReturPemakaian::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');
        }

    }

    public function stInvReturPemakaian_data(Request $request)
    {
        // $data = StInvent::query();
      $data = DB::table(DB::raw("(SELECT tr_invent_stock.*,temp_qty.qty as qty, mstr_jnsalat_merk.keterangan as ket, tr_detail_saldo_awal.harga_satuan as hrg_sat FROM tr_invent_stock LEFT JOIN temp_qty ON tr_invent_stock.kd_brg = temp_qty.kd_brg
          LEFT JOIN mstr_jnsalat_merk ON tr_invent_stock.kel_brg = mstr_jnsalat_merk.kode_jnsAlatMerk LEFT JOIN tr_detail_saldo_awal ON tr_invent_stock.kd_brg = tr_detail_saldo_awal.kd_brg) as tis"));
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
                                        data-hrg_sat="'.$data->hrg_sat.'"
                                class="btn btn-primary btn-sm clickInv" title="pilih">PILIH</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                // ->toJson();
                ->make(true);
    }

    public function stInvReturPemakaian_data_x(Request $request)
    {
        // $data = StInvent::query();
      $data = DB::table(DB::raw("(SELECT tr_invent_stock.*,temp_qty.qty as qty, mstr_jnsalat_merk.keterangan as ket, tr_detail_saldo_awal.harga_satuan as hrg_sat FROM tr_invent_stock LEFT JOIN temp_qty ON tr_invent_stock.kd_brg = temp_qty.kd_brg
          LEFT JOIN mstr_jnsalat_merk ON tr_invent_stock.kel_brg = mstr_jnsalat_merk.kode_jnsAlatMerk LEFT JOIN tr_detail_saldo_awal ON tr_invent_stock.kd_brg = tr_detail_saldo_awal.kd_brg) as tis"));
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
                                        data-hrg_sat="'.$data->hrg_sat.'"
                                class="btn btn-primary btn-sm clickInv_x" title="pilih">PILIH</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                // ->toJson();
                ->make(true);
    }    

    // public function stInvent_edit(Request $request)
    // {
    //     StInvent::where('id', $request->idM)
    //               ->update(['part_numb' => $request->part_numb,
    //                         'ukuran' => $request->ukuran,
    //                         'uom' => $request->uom,
    //                         'merk' => $request->merk,
    //                         'status' => $request->status
    //                         ]);
    //     return redirect()->route('stInvent')->with('success', 'Edit data sukses!');
    // }

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
