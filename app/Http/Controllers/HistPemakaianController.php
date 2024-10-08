<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StInvent;
use App\Models\TrHeaderPemakaianSpBbm;
use App\Models\TrDetailPemSpBbm;
use App\Models\TrDetailPemBbm;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Session;

class HistPemakaianController extends Controller
{
    public function histPemakaian(Request $request)
    {
        $bulan = Helper::bulan();
        $data['title'] = 'History Pemakaian';
        $stInvent = StInvent::all();
        return view('transaction/rpt_histPemakaian', $data,compact('bulan','stInvent'));
    }

    public function histPemakaian_rpt(Request $request)
    {   
        // dd($request);
        // $bln = date("m", strtotime($request->bulan));
        // $thn = date("Y", strtotime($request->tahun));
        $bulan = Helper::bulan();
        $bln = $request->bulan;
        $thn = $request->tahun;
        $kd_brg = $request->kd_brg;

        $year = substr($thn,2,2);
        $month = str_pad($bln, 2, "0", STR_PAD_LEFT);
        $gabYm = $year.$month;    

        $getDetailPsb = TrDetailPemSpBbm::leftJoin('tr_invent_stock as tris', 'tris.kd_brg','=','tr_detail_pem_sp_bbm.kd_brg')
                                    ->leftJoin('mstr_jnsalat_merk as mjam', 'mjam.kode_jnsAlatMerk','=','tris.kel_brg')
                                    ->leftJoin('mstr_fixed_asset as mfa', 'mfa.kode_fa','=','tr_detail_pem_sp_bbm.kd_fa')
                                    ->leftJoin('mstr_sts_pemakaian as msp', 'msp.kode','=','tr_detail_pem_sp_bbm.kd_sts')
                                    ->where('tr_detail_pem_sp_bbm.kode_periode','=',$gabYm)
                                    ->where('tr_detail_pem_sp_bbm.kd_brg','=',$kd_brg)
                                    ->get(['tr_detail_pem_sp_bbm.*','tris.kd_brg as kdbrg','tris.part_numb as partnumb','tris.merk as merk','tris.ukuran as ukuran','mjam.keterangan as ketjnsalat','mfa.nama_fa as nmfa','msp.keterangan as stspakai']);

        $getDetailPbbm = TrDetailPemBbm::leftJoin('tr_invent_stock as tris', 'tris.kd_brg','=','tr_detail_pem_bbm.kd_brg')
                                    ->leftJoin('mstr_jnsalat_merk as mjam', 'mjam.kode_jnsAlatMerk','=','tr_detail_pem_bbm.jns_alat')
                                    ->leftJoin('mstr_fixed_asset as mfa', 'mfa.kode_fa','=','tr_detail_pem_bbm.kd_fa')
                                    ->leftJoin('mstr_sts_pemakaian as msp', 'msp.kode','=','tr_detail_pem_bbm.sts_pakai')
                                    ->leftJoin('mstr_lokasi as ml', 'ml.kode_lokasi','=','tr_detail_pem_bbm.kode_lokasi')
                                    ->leftJoin('mstr_aktivitas as ma', 'ma.kode_akv','=','tr_detail_pem_bbm.kode_akv')                                
                                    ->where('tr_detail_pem_bbm.kd_brg','=',$kd_brg)
                                    ->where('tr_detail_pem_bbm.kode_periode',$gabYm)
                                    ->get(['tr_detail_pem_bbm.*','tris.kd_brg as kdbrg','tris.part_numb as part_numb','tris.ukuran as ukuran','mjam.keterangan as nmJnsAlat','mfa.kode_fa as kdfa','mfa.nama_fa as nmfa','msp.kode as kdsp','msp.keterangan as ketsp','ml.kode_lokasi as kdlok','ml.nama_lokasi as nmlok','ma.kode_akv as kdakv','ma.nama_akv as nmakv']);
 
        // $data['title'] = 'Detail Pemakaian Sparepart & BBM';
        // return view('transaction/rpt_histPemakaian', $data, compact('bulan','getDetailPsb'));    
        return redirect()->route('histPemakaian')
                            ->with('title', 'History Pemakaian Sparepart/Bbm Umum')
                            ->with('title2', 'History Pemakaian Bbm/Pelumas Alat Berat')
                            ->with('getDetailPsb', $getDetailPsb)
                            ->with('getDetailPbbm', $getDetailPbbm);

        
            // $jns_menu = "Pindah Gudang";
            // $getSumNilai = DB::select(DB::raw("SELECT a.*,b.no_sppb,b.tgl_sa,b.supplier,e.ukuran,d.nama_supp FROM tr_detail_saldo_awal a 
            //                                 LEFT JOIN tr_header_saldo_awal b ON b.id = a.id_head_sa 
            //                                 LEFT JOIN import_saldo_awal c ON c.kd_brg = a.kd_brg 
            //                                 LEFT JOIN mstr_supplier d ON d.kode_supp = b.supplier
            //                                 LEFT JOIN tr_invent_stock e ON e.kd_brg = a.kd_brg 
            //                                 WHERE a.kode_periode = $gabYm and e.kel_brg not in ('MP991')"));

            // $array = json_decode(json_encode($getSumNilai), true);

            // return redirect()->route('histPemakaian')
            //                 ->with('getSel', $array);
        
        
    }

    public function stInvHp_data(Request $request)
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

}
