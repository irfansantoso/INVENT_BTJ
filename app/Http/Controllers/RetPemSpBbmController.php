<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TrHeaderRetPemSpBbm;
use App\Models\TrDetailRetPemSpBbm;
use App\Models\StInvent;
use App\Models\StsPemakaian;
use App\Models\Lokasi;
use App\Models\Supplier;
use App\Models\FixedAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Session;

class RetPemSpBbmController extends Controller
{
    public static function getKodePeriodeOperasional()
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);
        return $jsonx[0]['kode_periode'];
    }

    public static function getTahunPeriodeOperasional()
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('tahun_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);        
        return $jsonx[0]['tahun_periode'];
    }
    
    public static function getNewNoRef($kd_area)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $getLastNo = DB::table('tr_header_rp_sp_bbm')
                        ->select('no_ref')
                        ->where('kode_periode','=',$jsonx[0]['kode_periode'])
                        ->where('kd_area','=',$kd_area)
                        ->orderBy('no_ref','desc')
                        ->get();        

        $jsonz = json_decode($getLastNo, true);
        $newNo1 = $jsonx[0]['kode_periode'];
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

    public static function getNewNoBpm($kd_area)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $getLastNo = DB::table('tr_header_rp_sp_bbm')
                        ->select('no_sppb')
                        ->where('kode_periode','=',$jsonx[0]['kode_periode'])
                        ->where('kd_area','=',$kd_area)
                        ->orderBy('no_sppb','desc')
                        ->get();        

        $jsonz = json_decode($getLastNo, true);
        $newNo1 = $jsonx[0]['kode_periode']."/";
        if($getLastNo->count() > 0) {
            $nourut = substr($jsonz[0]['no_sppb'],  14, 4);
            $nourut++;            
            $newNo2 = sprintf("%04s", $nourut) ;
            return $newNo1.$newNo2;
        }else{            
            $newNo3 = '0001';
            return $newNo1.$newNo3;
        }        
    }

    public function trHeaderRetPemSpBbm()
    {
        $headerRetPemSpBbm =  TrHeaderRetPemSpBbm::all();
        $supplier = Supplier::all();

        $data['title'] = 'Header Retur Pembelian Sparepart & BBM';
        return view('transaction/pengeluaran_spbbm/trHeaderRetPemSpBbm', $data, compact('headerRetPemSpBbm','supplier'));
    }

    public function trHeaderRetPemSpBbm_data(Request $request)
    {
        // $data = TrHeaderRetPemSpBbm::query();
        // $data =  TrHeaderRetPemSpBbm::leftJoin('mstr_supplier as ms', 'ms.kode_supp','=','tr_header_saldo_awal.supplier')
        //                             ->get(['tr_header_saldo_awal.*','ms.nama_supp as ns']);
        $getNPO = DB::table('periode_operasional')
                        ->select('*')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $data = DB::table(DB::raw("(SELECT tr_header_rp_sp_bbm.*, mka.nama_area as nama, ms.nama_supp as nmsupp FROM tr_header_rp_sp_bbm LEFT JOIN mstr_kd_area as mka ON tr_header_rp_sp_bbm.kd_area = mka.kode_area LEFT JOIN mstr_supplier as ms ON tr_header_rp_sp_bbm.supplier = ms.kode_supp WHERE tr_header_rp_sp_bbm.kode_periode = ".$jsonx[0]['kode_periode'].") as tis"));                                    

        return Datatables::of($data)
                ->setTotalRecords(100)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    
                    $btn = '<a href="'. url('trDetailRetPemSpBbm').'/'.$data->id.'" class="edit btn btn-primary btn-sm">Detail</a>';
                    if(Auth::user()->level == "administrator"){
                    $btn .= '<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id.'" data-sppb="'.$data->no_sppb.'" class="btn btn-danger btn-sm delDetRetPemSpBbm" title="Delete">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                // ->toJson();
                ->make(true);
    }

    public function trHeaderRetPemSpBbm_add(Request $request)
    {
        // dd($request->kode_periode);
        // exit();

        $getNPO = DB::table('periode_operasional')
                        ->select('*')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        if($request->tgl_rp_sp_bbm < $jsonx[0]['awal_tgl'] || $request->tgl_rp_sp_bbm > $jsonx[0]['akhir_tgl'])
        {
           // return redirect()->route('tr_header_rp_sp_bbm')->with('error', 'Tanggal tidak sesuai dengan tahun periode!'); 
            return back()
                    ->withInput()
                    ->with('error','Tanggal tidak sesuai dengan tahun periode!');
        }

        $request->validate([
            'no_ref' => 'required|unique:tr_header_rp_sp_bbm',
            'no_sppb' => 'required',
        ]);

        $trHeaderRetPemSpBbm = new TrHeaderRetPemSpBbm([
            'no_ref' => $request->no_ref,
            'no_sppb' => $request->no_sppb,
            'kd_area' => $request->kd_area,
            'supplier' => $request->supplier,
            'kode_periode' => $request->kode_periode,
            'tgl_rp_sp_bbm' => $request->tgl_rp_sp_bbm,
            'keterangan' => $request->keterangan,
            'user_created' => Auth::user()->name
        ]);
        $trHeaderRetPemSpBbm->save();
        return redirect()->route('trHeaderRetPemSpBbm')->with('success', 'Tambah data sukses!');
    }

    public function trHeaderRetPemSpBbmDestroy_del(Request $request)
    {

        $getDetRetPemSpBbm = TrDetailRetPemSpBbm::where('id_head_rp_spbbm','=',$request->del_id)->get();
        if (!$getDetRetPemSpBbm->isEmpty()) 
        { 
            return back()->with('error',' Failed, Hapus data detailnya terlebih dahulu!');
        }else{
            TrHeaderRetPemSpBbm::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');            
        }
    }

    public function trDetailRetPemSpBbm($id_head_rp_spbbm)
    {
        // $getHeaderRpsb = TrHeaderRetPemSpBbm::find($id_head_rp_spbbm);
        $getHeaderRpsb = TrHeaderRetPemSpBbm::leftJoin('mstr_kd_area as mkd', 'mkd.kode_area','=','tr_header_rp_sp_bbm.kd_area')
                                    ->leftJoin('mstr_supplier as ms', 'ms.kode_supp','=','tr_header_rp_sp_bbm.supplier')        
                                    ->where('tr_header_rp_sp_bbm.id','=',$id_head_rp_spbbm)
                                    ->first(['tr_header_rp_sp_bbm.*','mkd.nama_area as nmarea','ms.nama_supp as nmsupp']);  
        $fixedAsset = FixedAsset::all();
        $stsPemakaian = StsPemakaian::all();
        $stInvent = StInvent::all();
        $getDetailRpSb = TrDetailRetPemSpBbm::leftJoin('tr_invent_stock as tris', 'tris.kd_brg','=','tr_detail_rp_sp_bbm.kd_brg')
                                    ->leftJoin('mstr_jnsalat_merk as mjam', 'mjam.kode_jnsAlatMerk','=','tris.kel_brg')
                                    ->leftJoin('mstr_fixed_asset as mfa', 'mfa.kode_fa','=','tr_detail_rp_sp_bbm.kd_fa')
                                    ->leftJoin('mstr_sts_pemakaian as msp', 'msp.kode','=','tr_detail_rp_sp_bbm.kd_sts')
                                    ->where('tr_detail_rp_sp_bbm.id_head_rp_spbbm','=',$id_head_rp_spbbm)
                                    ->get(['tr_detail_rp_sp_bbm.*','tris.kd_brg as kdbrg','tris.part_numb as partnumb','tris.merk as merk','tris.ukuran as ukuran','mjam.keterangan as ketjnsalat','mfa.nama_fa as nmfa','msp.keterangan as stspakai']);
 
        $data['title'] = 'Detail Retur Pembelian Sparepart & BBM';
        return view('transaction/pengeluaran_spbbm/trDetailRetPemSpBbm', $data, compact('getHeaderRpsb','fixedAsset','stsPemakaian','stInvent','getDetailRpSb'));
        
    }

    public function trDetailRetPemSpBbm_add(Request $request)
    {

        $request->validate([
            'kd_brg' => 'required',
        ]);

        $year = date('Y', strtotime($request->tgl_det_rp_spbbm));
        $month = date("m", strtotime($request->tgl_det_rp_spbbm));

        $trDetailRetPemSpBbm = new trDetailRetPemSpBbm([
            'id_head_rp_spbbm' => $request->id_head_rp_spbbm,
            'kd_brg' => $request->kd_brg,
            'gudang' => $request->kd_area,
            'tgl_det_rp_spbbm' => $request->tgl_det_rp_spbbm,
            'year' => $year,
            'month' => $month,
            'kd_fa' => $request->kode_fa,
            'qty' => $request->qty,
            'total' => $request->total,
            'hrg_beli' => $request->hrg_beli,
            'nm_brg' => $request->nm_brg,
            'uom' => $request->uom,
            'kd_sts' => $request->kode_sp,
            'kode_periode' => $request->kode_periode,
            'keterangan' => $request->keterangan,
            'supplier' => $request->supplier,
            'user_created' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);        

        if (Auth::user()->username == null or Auth::user()->username == "") {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            $trDetailRetPemSpBbm->save();
            return redirect()->route('trDetailRetPemSpBbm',[$request->id_head_rp_spbbm])->with('success', 'Tambah data sukses!');
        }
    }

    public function trDetailRetPemSpBbm_edit(Request $request)
    {

        TrDetailRetPemSpBbm::where('id', $request->id)
                  ->update([
                            'kd_brg' => $request->kd_brg,
                            'kd_fa' => $request->kode_fa,
                            'qty' => $request->qty,
                            'hrg_beli' => $request->hrg_beli,
                            'nm_brg' => $request->nm_brg,
                            'uom' => $request->uom,
                            'kd_sts' => $request->kode_sp,
                            'keterangan' => $request->keterangan,
                            'user_created' => Auth::user()->name,
                            'updated_at' => date('Y-m-d H:i:s'),
                            ]);
        // return redirect()->route('trDetailRetPemSpBbm',[$request->id_head_rp_spbbm])->with('success', 'Ubah data sukses!');
                  return back()->with('success',' Ubah data successfully');

    }

    public function trDetailRetPemSpBbm_del(Request $request)
    {
        $getDetRetPemSpBbm =  TrDetailRetPemSpBbm::where('id','=',$request->del_id)->get();
        if ($getDetRetPemSpBbm->isEmpty()) 
        { 
            return back()->with('error',' Failed, data tidak ada!');
        }else{
            TrDetailRetPemSpBbm::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');
        }

    }

    public function stInvRpSpBbm_data(Request $request)
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
                    
                    if($data->qty){
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
                    }else{
                        $btn = '<a href="#"></a>';        
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                // ->toJson();
                ->make(true);
    }

    public function stInvRpSpBbm_data_x(Request $request)
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
                    
                    if($data->qty){
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
                    }else{
                        $btn = '<a href="#"></a>';        
                    }
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
