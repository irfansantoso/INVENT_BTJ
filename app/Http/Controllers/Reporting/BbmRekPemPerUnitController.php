<?php

namespace App\Http\Controllers\Reporting;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProcessGlobalController;
use App\Http\Controllers\ProcessQtyController;
use App\Models\TrDetailPindahGudang;
use App\Helpers\Helper;
use App\Exports\ExportBbmRekPemPerUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class BbmRekPemPerUnitController extends Controller
{
    public function bbmRekPemPerUnit(Request $request)
    {
        $bulan = Helper::bulan();
        $data['title'] = 'Bbm Rekap Pemakaian Per Unit';
        // Buat instance dari controller lain
        $ProcessGlobalController = new ProcessGlobalController();
        $ProcessQtyController = new ProcessQtyController();

        // Panggil fungsi-fungsi yang diperlukan
        $ProcessGlobalController->processGlobal();
        $ProcessQtyController->processQty();
        return view('reporting/rpt_bbmRekPemPerUnit', $data,compact('bulan'));
    }

    public function bbmRekPemPerUnit_rpt(Request $request)
    {   
        // dd($request);
        // $bln = date("m", strtotime($request->bulan));
        // $thn = date("Y", strtotime($request->tahun));
        $bln = $request->bulan;
        $thn = $request->tahun;

        $year = substr($thn,2,2);
        $month = str_pad($bln, 2, "0", STR_PAD_LEFT);
        $gabYm = $year.$month;        

        // $getSumNilai = DB::select(DB::raw("SELECT a.kd_fa,c.nama_fa FROM tr_detail_pem_sp_bbm a 
        //                                 LEFT JOIN tr_invent_stock b ON b.kd_brg = a.kd_brg 
        //                                 LEFT JOIN mstr_fixed_asset c ON c.kode_fa = a.kd_fa WHERE a.kode_periode = $gabYm"));

        $getSumNilai = DB::select(DB::raw("SELECT z.kdfa, z.nmfa,
                                            SUM(z.ttl_hmkm) AS ttl_hmkm,
                                            SUM(z.ltr_solar) AS ltr_solar,
                                            SUM(z.rata_hmkm) AS rata_hmkm,
                                            SUM(ROUND(z.ttl_solar_rupiah, 2)) AS ttl_solar_rupiah,
                                            SUM(ROUND(z.ttl_bensin_rupiah, 2)) AS ttl_bensin_rupiah,
                                            SUM(ROUND(z.ttl_mtanah_rupiah, 2)) AS ttl_mtanah_rupiah,
                                            SUM(ROUND(z.ttl_mrem_rupiah, 2)) AS ttl_mrem_rupiah,
                                            SUM(ROUND(z.ttl_mgrease_rupiah, 2)) AS ttl_mgrease_rupiah,
                                            SUM(z.ltr_pelumas) AS ltr_pelumas,
                                            SUM(ROUND(z.ttl_pelumas_rupiah, 2)) AS ttl_pelumas_rupiah,
                                            SUM(ROUND(z.ttl_solar_rupiah, 2)) + SUM(ROUND(z.ttl_bensin_rupiah, 2)) + SUM(ROUND(z.ttl_mtanah_rupiah, 2)) + SUM(ROUND(z.ttl_mrem_rupiah, 2)) + SUM(ROUND(z.ttl_mgrease_rupiah, 2)) + SUM(ROUND(z.ttl_pelumas_rupiah, 2)) AS ttlAll
                                    FROM (
                                        SELECT a.kd_fa AS kdfa, 
                                               b.nama_fa AS nmfa,
                                               CASE WHEN a.sts_pakai = '10' THEN a.krj_alat ELSE 0 END as ttl_hmkm,
                                               CASE WHEN a.sts_pakai = '10' THEN a.jumlah ELSE 0 END as ltr_solar,
                                               CASE WHEN a.sts_pakai = '10' THEN a.rata_rata ELSE 0 END as rata_hmkm,
                                               CASE WHEN a.sts_pakai = '10' THEN a.hrg_beli * a.jumlah ELSE 0 END as ttl_solar_rupiah,
                                               CASE WHEN a.sts_pakai = '11' THEN a.jumlah ELSE 0 END as ltr_bensin,
                                               CASE WHEN a.sts_pakai = '11' THEN a.hrg_beli * a.jumlah ELSE 0 END as ttl_bensin_rupiah,
                                               CASE WHEN a.sts_pakai = '12' THEN a.jumlah ELSE 0 END as ltr_m_tnh,
                                               CASE WHEN a.sts_pakai = '12' THEN a.hrg_beli * a.jumlah ELSE 0 END as ttl_mtanah_rupiah,
                                               CASE WHEN a.sts_pakai = '13' THEN a.jumlah ELSE 0 END as ltr_m_rem,
                                               CASE WHEN a.sts_pakai = '13' THEN a.hrg_beli * a.jumlah ELSE 0 END as ttl_mrem_rupiah,
                                               CASE WHEN a.sts_pakai = '14' THEN a.jumlah ELSE 0 END as ltr_m_grease,
                                               CASE WHEN a.sts_pakai = '14' THEN a.hrg_beli * a.jumlah ELSE 0 END as ttl_mgrease_rupiah,
                                               CASE WHEN a.sts_pakai = '15' THEN a.jumlah ELSE 0 END as ltr_pelumas,
                                               CASE WHEN a.sts_pakai = '15' THEN a.hrg_beli * a.jumlah ELSE 0 END as ttl_pelumas_rupiah
                                        FROM tr_detail_pem_bbm a
                                        LEFT JOIN mstr_fixed_asset b ON b.kode_fa = a.kd_fa
                                        WHERE a.kode_periode = $gabYm AND a.sts_pakai IN ('10', '11', '12', '13', '14', '15')

                                        UNION ALL

                                        SELECT a.kd_fa AS kdfa, 
                                               b.nama_fa AS nmfa,
                                               0 as ttl_hmkm,
                                               CASE WHEN a.kd_sts = '10' THEN a.qty ELSE 0 END as ltr_solar,
                                               0 as rata_hmkm,
                                               CASE WHEN a.kd_sts = '10' THEN a.hrg_beli * a.qty ELSE 0 END as ttl_solar_rupiah,
                                               CASE WHEN a.kd_sts = '11' THEN a.qty ELSE 0 END as ltr_bensin,
                                               CASE WHEN a.kd_sts = '11' THEN a.hrg_beli * a.qty ELSE 0 END as ttl_bensin_rupiah,
                                               CASE WHEN a.kd_sts = '12' THEN a.qty ELSE 0 END as ltr_m_tnh,
                                               CASE WHEN a.kd_sts = '12' THEN a.hrg_beli * a.qty ELSE 0 END as ttl_mtanah_rupiah,
                                               CASE WHEN a.kd_sts = '13' THEN a.qty ELSE 0 END as ltr_m_rem,
                                               CASE WHEN a.kd_sts = '13' THEN a.hrg_beli * a.qty ELSE 0 END as ttl_mrem_rupiah,
                                               CASE WHEN a.kd_sts = '14' THEN a.qty ELSE 0 END as ltr_m_grease,
                                               CASE WHEN a.kd_sts = '14' THEN a.hrg_beli * a.qty ELSE 0 END as ttl_mgrease_rupiah,
                                               CASE WHEN a.kd_sts = '15' THEN a.qty ELSE 0 END as ltr_pelumas,
                                               CASE WHEN a.kd_sts = '15' THEN a.hrg_beli * a.qty ELSE 0 END as ttl_pelumas_rupiah
                                        FROM tr_detail_pem_sp_bbm a
                                        LEFT JOIN mstr_fixed_asset b ON b.kode_fa = a.kd_fa 
                                        WHERE a.kode_periode = $gabYm AND a.kd_sts IN ('10', '11', '12', '13', '14', '15')
                                    ) z
                                    GROUP BY z.kdfa, z.nmfa;
"));

        $array = json_decode(json_encode($getSumNilai), true);

        $fileNm = "BBM-Rekap-Pemakaian-Per-Unit-".$bln."_".$thn.".xlsx";
        return Excel::download(new ExportBbmRekPemPerUnit($bln,$thn,$array), $fileNm);
        
    }

}
