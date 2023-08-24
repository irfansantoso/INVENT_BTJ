<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TrHeaderPemakaianBbm;
use App\Models\TrDetailPemBbm;
use App\Models\StInvent;
use App\Models\StsPemakaian;
use App\Models\Lokasi;
use App\Models\FixedAsset;
use App\Models\AktivitasAlat;
use App\Models\GabJnsAlatMerk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Session;

class PemakaianBbmController extends Controller
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

        $getLastNo = DB::table('tr_header_pemakaian_bbm')
                        ->select('no_ref')
                        // ->where('kode_periode','=',$jsonx[0]['kode_periode'])
                        ->where('kd_area','=',$kd_area)
                        ->orderBy('no_ref','desc')
                        ->get();        

        $jsonz = json_decode($getLastNo, true);
        if($getLastNo->count() > 0) {
            $nourut = substr($jsonz[0]['no_ref'], 4, 5);
            $nourut++;
            $newNo2 = sprintf("%04s", $nourut) ;
            return $newNo2;
        }else{            
            $newNo3 = '0001';
            return $newNo3;
        }
    }    

    public function trHeaderPemakaianBbm()
    {
        $headerPemakaianBbm =  TrHeaderPemakaianBbm::all();
        $lokasi = Lokasi::all();
        $fixAsset = FixedAsset::all(); 

        $data['title'] = 'Header Pemakaian BBM';
        return view('transaction/pengeluaran_bbm/trHeaderPemakaianBbm', $data, compact('headerPemakaianBbm','lokasi','fixAsset'));
    }

    public function trHeaderPemakaianBbm_data(Request $request)
    {
        // $data = TrHeaderPemakaianBbm::query();
        // $data =  TrHeaderPemakaianBbm::leftJoin('mstr_supplier as ms', 'ms.kode_supp','=','tr_header_saldo_awal.supplier')
        //                             ->get(['tr_header_saldo_awal.*','ms.nama_supp as ns']);

        $data = DB::table(DB::raw("(SELECT tr_header_pemakaian_bbm.*,mstr_fixed_asset.nama_fa as nmfa,mstr_lokasi.nama_lokasi as nmlok, mstr_kd_area.nama_area as nmarea FROM tr_header_pemakaian_bbm LEFT JOIN mstr_lokasi ON tr_header_pemakaian_bbm.loc_activity = mstr_lokasi.kode_lokasi LEFT JOIN mstr_fixed_asset ON tr_header_pemakaian_bbm.no_bpm = mstr_fixed_asset.kode_fa LEFT JOIN mstr_kd_area ON tr_header_pemakaian_bbm.kd_area = mstr_kd_area.kode_area) as tis"));

        return Datatables::of($data)
                ->setTotalRecords(100)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    
                    $btn = '<a href="'. url('trDetailPemBbm').'/'.$data->id.'" class="edit btn btn-primary btn-sm">Detail</a>';
                    if(Auth::user()->level == "administrator"){
                    $btn .= '<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id.'" data-kode="'.$data->no_bpm.'" class="btn btn-danger btn-sm delPemBbm" title="Delete">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                // ->toJson();
                ->make(true);
    }

    public function trHeaderPemakaianBbm_add(Request $request)
    {
        // $getNPO = DB::table('periode_operasional')
        //                 ->select('*')->where('status_periode','1')
        //                 ->get();
        // $jsonx = json_decode($getNPO, true);

        // if($request->tgl_pb < $jsonx[0]['awal_tgl'] || $request->tgl_pb > $jsonx[0]['akhir_tgl'])
        // {
        //    return redirect()->route('trHeaderPindahGudang')->with('error', 'Tanggal tidak sesuai dengan tahun periode!'); 
        // }

        $request->validate([
            'no_ref' => 'required|unique:tr_header_pemakaian_bbm',
            'no_bpm' => 'required',
        ]);

        $trHeaderPemakaianBbm = new TrHeaderPemakaianBbm([
            'no_ref' => $request->no_ref,
            'no_bpm' => $request->no_bpm,
            'kd_area' => $request->kd_area,
            'kode_periode' => $request->kode_periode,
            'tgl_p_bbm' => date('Y-m-d H:i:s'),
            'loc_activity' => $request->loc_activity,
            'user_created' => Auth::user()->name
        ]);
        $trHeaderPemakaianBbm->save();
        return redirect()->route('trHeaderPemakaianBbm')->with('success', 'Tambah data sukses!');
    }

    public function trHeaderPemakaianBbmDestroy_del(Request $request)
    {
        $getDetSa =  TrDetailPemBbm::where('id_head_p_bbm','=',$request->del_id)->get();
        if (!$getDetSa->isEmpty()) 
        { 
            return back()->with('error',' Failed, Hapus data detail terlebih dahulu!');
        }else{
            TrHeaderPemakaianBbm::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');
        }

    }

    public function trDetailPemBbm($id_head_p_bbm)
    {
        // $getHeaderPemBbm = TrHeaderPemakaianBbm::find($id_head_p_bbm);
        $getNPO = DB::table('periode_operasional')
                        ->select('*')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $getHeaderPemBbm = TrHeaderPemakaianBbm::leftJoin('mstr_fixed_asset as mfa', 'mfa.kode_fa','=','tr_header_pemakaian_bbm.no_bpm')
                                    ->leftJoin('mstr_kd_area as mkd', 'mkd.kode_area','=','tr_header_pemakaian_bbm.kd_area')                            
                                    ->where('tr_header_pemakaian_bbm.id','=',$id_head_p_bbm)
                                    ->first(['tr_header_pemakaian_bbm.*','mfa.nama_fa as nmfa','mkd.nama_area as nmarea']);
  
        // $fixedAsset = FixedAsset::all();
        $fixedAsset = FixedAsset::where('kode_fa','=',$getHeaderPemBbm->no_bpm)
                                ->get(['kode_fa','nama_fa']);
        $stsPemakaian = StsPemakaian::all();    
        $stInvent = StInvent::all();
        $getDetailPbbm = TrDetailPemBbm::leftJoin('tr_invent_stock as tris', 'tris.kd_brg','=','tr_detail_pem_bbm.kd_brg')
                                    ->leftJoin('mstr_jns_alat as mja', 'mja.kode_jnsAlat','=','tr_detail_pem_bbm.jns_alat')
                                    ->leftJoin('mstr_fixed_asset as mfa', 'mfa.kode_fa','=','tr_detail_pem_bbm.kd_fa')
                                    ->leftJoin('mstr_sts_pemakaian as msp', 'msp.kode','=','tr_detail_pem_bbm.sts_pakai')
                                    ->leftJoin('mstr_lokasi as ml', 'ml.kode_lokasi','=','tr_detail_pem_bbm.kode_lokasi')
                                    ->leftJoin('mstr_aktivitas as ma', 'ma.kode_akv','=','tr_detail_pem_bbm.kode_akv')                                
                                    ->where('tr_detail_pem_bbm.id','=',$id_head_p_bbm)
                                    ->where('tr_detail_pem_bbm.kode_periode',$jsonx[0]['kode_periode'])
                                    ->get(['tr_detail_pem_bbm.*','tris.kd_brg as kdbrg','tris.part_numb as part_numb','tris.ukuran as ukuran','mja.nama_jnsAlat as nmJnsAlat','mfa.kode_fa as kdfa','mfa.nama_fa as nmfa','msp.kode as kdsp','msp.keterangan as ketsp','ml.kode_lokasi as kdlok','ml.nama_lokasi as nmlok','ma.kode_akv as kdakv','ma.nama_akv as nmakv']);
 
        $data['title'] = 'Detail Pemakaian BBM';
        $lokasi = Lokasi::all();
        $gjam = GabJnsAlatMerk::all();
        $aktivAlat = AktivitasAlat::all();
        return view('transaction/pengeluaran_bbm/trDetailPemBbm', $data, compact('getHeaderPemBbm','fixedAsset','stsPemakaian','stInvent','getDetailPbbm','lokasi','gjam','aktivAlat'));
        
    }

    public function trDetailPemBbm_add(Request $request)
    {
        // dd($request);
        // echo($request->tgl_det_p_bbm);
        // exit();
        $getNPO = DB::table('periode_operasional')
                        ->select('*')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        if($request->tgl_det_p_bbm < $jsonx[0]['awal_tgl'] || $request->tgl_det_p_bbm > $jsonx[0]['akhir_tgl'])
        {
           return redirect()->route('trDetailPemBbm')->with('error', 'Tanggal tidak sesuai dengan tahun periode yang dipilih!'); 
        }

        $request->validate([
            'kd_brg' => 'required',
        ]);

        // $year = date('Y', strtotime($request->tgl_det_p_bbm));
        // $month = date("m", strtotime($request->tgl_det_p_bbm));

        $trDetailPemBbm = new trDetailPemBbm([
            'id_head_p_bbm' => $request->id_head_p_bbm,
            'kd_brg' => $request->kd_brg,
            'jns_alat' => $request->jns_alat,
            'jumlah' => $request->jumQty,
            'uom' => $request->uom,
            'hrg_beli' => $request->hrg_beli,
            'kd_fa' => $request->kd_fa,
            'sts_pakai' => $request->kode_sp,
            'tgl_det_p_bbm' => $request->tgl_det_p_bbm,
            'hmkm_awal' => $request->hmkm_awal,
            'hmkm_akhir' => $request->hmkm_akhir,
            'krj_alat' => $request->krj_alat,
            'rata_rata' => $request->rata_rata,
            'kode_lokasi' => $request->kode_lokasi,
            'kode_akv' => $request->kode_akv,
            'keterangan' => $request->keterangan,
            'kode_periode' => $jsonx[0]['kode_periode'],
            'user_created' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);        

        if (Auth::user()->username == null or Auth::user()->username == "") {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return Redirect::back()->withInput(Input::all());
            // return redirect('/');
        }else{
            $trDetailPemBbm->save();
            return redirect()->route('trDetailPemBbm',[$request->id_head_p_bbm])->with('success', 'Tambah data sukses!');
        }
    }

    public function trDetailPemBbm_del(Request $request)
    {
        $getDetSa =  TrDetailPemBbm::where('id','=',$request->del_id)->get();
        if ($getDetSa->isEmpty()) 
        { 
            return back()->with('error',' Failed, data tidak ada!');
        }else{
            TrDetailPemBbm::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');
        }

    }

    public function stInvBbm_data(Request $request)
    {
        // $data = StInvent::query();
      $data = DB::table(DB::raw("(SELECT tr_invent_stock.*,temp_qty.qty as qty, mstr_jnsalat_merk.keterangan as ket FROM tr_invent_stock LEFT JOIN temp_qty ON tr_invent_stock.kd_brg = temp_qty.kd_brg
          LEFT JOIN mstr_jnsalat_merk ON tr_invent_stock.kel_brg = mstr_jnsalat_merk.kode_jnsAlatMerk WHERE tr_invent_stock.kel_brg = 'MP991') as tis"));
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
