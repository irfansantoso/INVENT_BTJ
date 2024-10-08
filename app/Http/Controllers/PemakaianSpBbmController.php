<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProcessGlobalController;
use App\Http\Controllers\ProcessQtyController;
use App\Models\TrHeaderPemakaianSpBbm;
use App\Models\TrDetailPemSpBbm;
use App\Models\StInvent;
use App\Models\StsPemakaian;
use App\Models\Lokasi;
use App\Models\FixedAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Session;

class PemakaianSpBbmController extends Controller
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

        $getLastNo = DB::table('tr_header_pemakaian_sp_bbm')
                        ->select('no_ref')
                        ->where('kode_periode','=',$jsonx[0]['kode_periode'])
                        ->where('kd_area','=',$kd_area)
                        ->orderBy('no_ref','desc')
                        ->get();        

        $jsonz = json_decode($getLastNo, true);
        $newNo1 = $jsonx[0]['kode_periode'];
        if($getLastNo->count() > 0) {
            $nourut = substr($jsonz[0]['no_ref'], 8, 4);
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

        $getLastNo = DB::table('tr_header_pemakaian_sp_bbm')
                        ->select('no_bpm')
                        ->where('kode_periode','=',$jsonx[0]['kode_periode'])
                        ->where('kd_area','=',$kd_area)
                        ->orderBy('no_bpm','desc')
                        ->get();        

        $jsonz = json_decode($getLastNo, true);
        $newNo1 = $jsonx[0]['kode_periode']."/";
        if($getLastNo->count() > 0) {
            $nourut = substr($jsonz[0]['no_bpm'],  11, 4);
            $nourut++;            
            $newNo2 = sprintf("%04s", $nourut) ;
            return $newNo1.$newNo2;
        }else{            
            $newNo3 = '0001';
            return $newNo1.$newNo3;
        }        
    }

    public function trHeaderPemakaianSpBbm()
    {
        $headerPemakaianSpBbm =  TrHeaderPemakaianSpBbm::all();
        $lokasi = Lokasi::all();

        // Buat instance dari controller lain
        $ProcessGlobalController = new ProcessGlobalController();
        $ProcessQtyController = new ProcessQtyController();

        // Panggil fungsi-fungsi yang diperlukan
        $ProcessGlobalController->processGlobal();
        $ProcessQtyController->processQty();

        $data['title'] = 'Header Pemakaian Sparepart & BBM';
        return view('transaction/pengeluaran_spbbm/trHeaderPemakaianSpBbm', $data, compact('headerPemakaianSpBbm','lokasi'));
    }

    public function trHeaderPemakaianSpBbm_data(Request $request)
    {
        // $data = TrHeaderPemakaianSpBbm::query();
        // $data =  TrHeaderPemakaianSpBbm::leftJoin('mstr_supplier as ms', 'ms.kode_supp','=','tr_header_saldo_awal.supplier')
        //                             ->get(['tr_header_saldo_awal.*','ms.nama_supp as ns']);
        $getNPO = DB::table('periode_operasional')
                        ->select('*')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $data = DB::table(DB::raw("(SELECT tr_header_pemakaian_sp_bbm.*,mstr_lokasi.nama_lokasi as nmlok FROM tr_header_pemakaian_sp_bbm LEFT JOIN mstr_lokasi ON tr_header_pemakaian_sp_bbm.loc_activity = mstr_lokasi.kode_lokasi WHERE tr_header_pemakaian_sp_bbm.kode_periode = ".$jsonx[0]['kode_periode'].") as tis"));                                    

        return Datatables::of($data)
                ->setTotalRecords(100)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    
                    $btn = '<a href="'. url('trDetailPemSpBbm').'/'.$data->id.'" class="edit btn btn-primary btn-sm">Detail</a>';
                    if(Auth::user()->level == "administrator"){
                    $btn .= '<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id.'" data-kode="'.$data->no_bpm.'" class="btn btn-danger btn-sm delDetPemSpBbm" title="Delete">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                // ->toJson();
                ->make(true);
    }

    public function trHeaderPemakaianSpBbm_add(Request $request)
    {
        // dd($request->kode_periode);
        // exit();
        $getNPO = DB::table('periode_operasional')
                        ->select('*')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        if($request->tgl_p_sp_bbm < $jsonx[0]['awal_tgl'] || $request->tgl_p_sp_bbm > $jsonx[0]['akhir_tgl'])
        {
            return back()
                    ->withInput()
                    ->with('error','Tanggal tidak sesuai dengan tahun periode!');
           // return redirect()->route('trHeaderPemakaianSpBbm')->with('error', 'Tanggal tidak sesuai dengan tahun periode!'); 
        }

        $request->validate([
            'no_ref' => 'required|unique:tr_header_pemakaian_sp_bbm',
            'no_bpm' => 'required',
        ]);

        $trHeaderPemakaianSpBbm = new TrHeaderPemakaianSpBbm([
            'no_ref' => $request->no_ref,
            'no_bpm' => $request->no_bpm,
            'kd_area' => $request->kd_area,
            'kode_periode' => $request->kode_periode,
            'tgl_p_sp_bbm' => $request->tgl_p_sp_bbm,
            'loc_activity' => $request->loc_activity,
            'user_created' => Auth::user()->name
        ]);
        $trHeaderPemakaianSpBbm->save();
        $getIdHead = DB::table('tr_header_pemakaian_sp_bbm')
                    ->select('*')->where('no_ref',$request->no_ref)
                    ->get();
        $jdIdHead = json_decode($getIdHead, true);
        return redirect()->route('trDetailPemSpBbm',$jdIdHead[0]['id'])->with('success', 'Tambah data header sukses!');
    }

    public function trHeaderPemakaianSpBbmDestroy_del(Request $request)
    {

        $getDetPemSpBbm = TrDetailPemSpBbm::where('id_head_p_spbbm','=',$request->del_id)->get();
        if (!$getDetPemSpBbm->isEmpty()) 
        { 
            return back()->with('error',' Failed, Hapus data detailnya terlebih dahulu!');
        }else{
            TrHeaderPemakaianSpBbm::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');            
        }
    }

    public function trDetailPemSpBbm($id_head_p_spbbm)
    {
        $getHeaderPsb = TrHeaderPemakaianSpBbm::find($id_head_p_spbbm); 
        $fixedAsset = FixedAsset::all();
        $stsPemakaian = StsPemakaian::all();
        $stInvent = StInvent::all();
        $getDetailPsb = TrDetailPemSpBbm::leftJoin('tr_invent_stock as tris', 'tris.kd_brg','=','tr_detail_pem_sp_bbm.kd_brg')
                                    ->leftJoin('mstr_jnsalat_merk as mjam', 'mjam.kode_jnsAlatMerk','=','tris.kel_brg')
                                    ->leftJoin('mstr_fixed_asset as mfa', 'mfa.kode_fa','=','tr_detail_pem_sp_bbm.kd_fa')
                                    ->leftJoin('mstr_sts_pemakaian as msp', 'msp.kode','=','tr_detail_pem_sp_bbm.kd_sts')
                                    ->where('tr_detail_pem_sp_bbm.id_head_p_spbbm','=',$id_head_p_spbbm)
                                    ->get(['tr_detail_pem_sp_bbm.*','tris.kd_brg as kdbrg','tris.part_numb as partnumb','tris.merk as merk','tris.ukuran as ukuran','mjam.keterangan as ketjnsalat','mfa.nama_fa as nmfa','msp.keterangan as stspakai']);
 
        $data['title'] = 'Detail Pemakaian Sparepart & BBM';
        return view('transaction/pengeluaran_spbbm/trDetailPemSpBbm', $data, compact('getHeaderPsb','fixedAsset','stsPemakaian','stInvent','getDetailPsb'));
        
    }

    public function trDetailPemSpBbm_add(Request $request)
    {

        $request->validate([
            'kd_brg' => 'required',
            'qty' => 'required',
            'hrg_beli' => 'required',
            'kode_fa' => 'required',
            'kode_sp' => 'required'
        ]);

        $year = date('Y', strtotime($request->tgl_det_p_spbbm));
        $month = date("m", strtotime($request->tgl_det_p_spbbm));
        // $getNil = DB::table('import_saldo_awal')
        //             ->select('qty','nilai')->where('kd_brg', $request->kd_brg)
        //             ->get();
        // $jNil = json_decode($getNil, true);
        // $valNil = !empty($jNil[0]['nilai']) ? $jNil[0]['nilai'] : 0;
        // $valQty = !empty($jNil[0]['qty']) ? $jNil[0]['qty'] : 0;

        // $hrg_temp = bcdiv($valNil, $valQty, 2);
        // $hrg_temp = ($valQty != 0) ? bcdiv($valNil, $valQty, 2) : 0;
        // $qty_temp = $jNil[0]['qty'] + $request->qty_temp;
        // $hrg_temp = $jNil[0]['nilai'] / $jNil[0]['qty'];

        // if(empty($request->hrg_beli)){                        
        //     // $hrg_beli = bcmul($hrg_temp,$request->qty,2);
        //     $hrg_beli = $hrg_temp * $request->qty;
        // }else{
        //     $hrg_before = ($request->hrg_beli + $valNil) / $request->qty_temp;
        //     $hrg_beli = $hrg_before * $request->qty;
        // }

        // $getNPO = DB::table('periode_operasional')
        //                 ->select('*')->where('status_periode','1')
        //                 ->get();
        // $jsonx = json_decode($getNPO, true);

        // if($request->tgl_det_p_bbm < $jsonx[0]['awal_tgl'] || $request->tgl_det_p_bbm > $jsonx[0]['akhir_tgl'])
        // {
        //    return redirect()->route('trDetailPemSpBbm')->with('error', 'Tanggal tidak sesuai dengan tahun periode yang dipilih!'); 
        // }

        $trDetailPemSpBbm = new trDetailPemSpBbm([
            'id_head_p_spbbm' => $request->id_head_p_spbbm,
            'kd_brg' => $request->kd_brg,
            'gudang' => $request->kd_area,
            'tgl_det_p_spbbm' => $request->tgl_det_p_spbbm,
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
            'user_created' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);        

        if (Auth::user()->username == null or Auth::user()->username == "") {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            $trDetailPemSpBbm->save();
            // Buat instance dari controller lain
            $ProcessGlobalController = new ProcessGlobalController();
            $ProcessQtyController = new ProcessQtyController();

            // Panggil fungsi-fungsi yang diperlukan
            $ProcessGlobalController->processGlobal();
            $ProcessQtyController->processQty();
            return redirect()->route('trDetailPemSpBbm',[$request->id_head_p_spbbm])->with('success', 'Tambah data sukses!');
        }
    }

    public function trDetailPemSpBbm_edit(Request $request)
    {

        TrDetailPemSpBbm::where('id', $request->id)
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
        // return redirect()->route('trDetailPemSpBbm',[$request->id_head_p_spbbm])->with('success', 'Ubah data sukses!');

        // Buat instance dari controller lain
        $ProcessGlobalController = new ProcessGlobalController();
        $ProcessQtyController = new ProcessQtyController();

        // Panggil fungsi-fungsi yang diperlukan
        $ProcessGlobalController->processGlobal();
        $ProcessQtyController->processQty();
        return back()->with('success',' Ubah data successfully');

    }

    public function trDetailPemSpBbm_del(Request $request)
    {
        $getDetSa =  TrDetailPemSpBbm::where('id','=',$request->del_id)->get();
        if ($getDetSa->isEmpty()) 
        { 
            return back()->with('error',' Failed, data tidak ada!');
        }else{
            TrDetailPemSpBbm::find($request->del_id)->delete();
            // Buat instance dari controller lain
            $ProcessGlobalController = new ProcessGlobalController();
            $ProcessQtyController = new ProcessQtyController();

            // Panggil fungsi-fungsi yang diperlukan
            $ProcessGlobalController->processGlobal();
            $ProcessQtyController->processQty();
            return back()->with('success',' Data deleted successfully');
        }

    }

    public function stInvSpBbm_data(Request $request)
    {
        // $data = StInvent::query();
      $data = DB::table(DB::raw("(SELECT tr_invent_stock.*,CAST(temp_qty.qty AS DECIMAL(10,2)) as qty,CAST(temp_qty.nilai AS DECIMAL(14,2)) as nilai, mstr_jnsalat_merk.keterangan as ket, tr_detail_saldo_awal.total as hrg_beli FROM tr_invent_stock LEFT JOIN temp_qty ON tr_invent_stock.kd_brg = temp_qty.kd_brg
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
                                            data-qty="'.$data->qty.'"
                                            data-nilai="'.$data->nilai.'"
                                            data-hrg_beli="'.$data->hrg_beli.'"
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

    public function stInvSpBbm_data_x(Request $request)
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
