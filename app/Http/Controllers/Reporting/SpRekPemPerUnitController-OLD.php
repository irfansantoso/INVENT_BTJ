<?php

namespace App\Http\Controllers\Reporting;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProcessGlobalController;
use App\Http\Controllers\ProcessQtyController;
use App\Models\TrDetailPindahGudang;
use App\Helpers\Helper;
use App\Exports\ExportSpRekPemPerUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class SpRekPemPerUnitController extends Controller
{
    public function spRekPemPerUnit(Request $request)
    {
        $bulan = Helper::bulan();
        $data['title'] = 'SP Rekap Pemakaian Per Unit';
        // Buat instance dari controller lain
        $ProcessGlobalController = new ProcessGlobalController();
        $ProcessQtyController = new ProcessQtyController();

        // Panggil fungsi-fungsi yang diperlukan
        $ProcessGlobalController->processGlobal();
        $ProcessQtyController->processQty();
        return view('reporting/rpt_spRekPemPerUnit', $data,compact('bulan'));
    }

    public function spRekPemPerUnit_rpt(Request $request)
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
                                           SUM(z.spart) AS spart,
                                           SUM(z.jumBanLuar) AS jumBanLuar,
                                           SUM(z.banLuar) AS banLuar,
                                           SUM(z.banDalam) AS banDalam,
                                           SUM(z.flape) AS flape,
                                           SUM(z.underCarriage) AS underCarriage,
                                           SUM(z.wrQty) AS wrQty,
                                           SUM(z.wrNil) AS wrNil,
                                           SUM(z.spart) + SUM(z.banLuar) + SUM(z.banDalam) + SUM(z.flape) + SUM(z.underCarriage) + SUM(z.wrNil) AS total
                                    FROM (
                                        SELECT a.kd_fa AS kdfa, 
                                               b.nama_fa AS nmfa,
                                               CASE WHEN a.kode_periode = $gabYm AND a.kd_brg NOT LIKE 'TR861%' and a.kd_brg NOT IN('WS991-W075','WS991-W076','WS991-W078') THEN a.hrg_beli*a.qty ELSE 0 END as spart,
                                               CASE WHEN a.kode_periode = $gabYm AND a.kd_brg IN ('TR861-T002','TR861-T013','TR861-T038','TR861-T052','TR861-T068','TR861-T069','TR861-T097','TR861-T100','TR861-T114','TR861-T116','TR861-T117','TR861-T119','TR861-T123','TR861-T126','TR861-T128','TR861-T130','TR861-T131','TR861-T132','TR861-T133','TR861-T200','TR861-T201','TR861-T204','TR861-T206','TR861-T208','TR861-T209','TR861-T210','TR861-T212','TR861-T213','TR861-T215','TR861-T217','TR861-T218','TR861-T219','TR861-T220','TR861-T221','TR861-T222','TR861-T223','TR861-T224','TR861-T225','TR861-T226','TR861-T227','TR861-T228','TR861-T229','TR861-U210') THEN a.qty ELSE 0 END as jumBanLuar,
                                               CASE WHEN a.kode_periode = $gabYm AND a.kd_brg IN ('TR861-T002','TR861-T013','TR861-T038','TR861-T052','TR861-T068','TR861-T069','TR861-T097','TR861-T100','TR861-T114','TR861-T116','TR861-T117','TR861-T119','TR861-T123','TR861-T126','TR861-T128','TR861-T130','TR861-T131','TR861-T132','TR861-T133','TR861-T200','TR861-T201','TR861-T204','TR861-T206','TR861-T208','TR861-T209','TR861-T210','TR861-T212','TR861-T213','TR861-T215','TR861-T217','TR861-T218','TR861-T219','TR861-T220','TR861-T221','TR861-T222','TR861-T223','TR861-T224','TR861-T225','TR861-T226','TR861-T227','TR861-T228','TR861-T229','TR861-U210') THEN a.hrg_beli*a.qty ELSE 0 END as banLuar,
                                               CASE WHEN a.kode_periode = $gabYm AND a.kd_brg IN ('TR861-T017','TR861-T018','TR861-T022','TR861-T112','TR861-T115','TR861-T118','TR861-T124','TR861-T127','TR861-T129','TR861-T202','TR861-T203','TR861-T205','TR861-T207','TR861-T211','TR861-T214','TR861-T216') THEN a.hrg_beli*a.qty ELSE 0 END as banDalam,
                                               CASE WHEN a.kode_periode = $gabYm AND a.kd_brg LIKE 'TR861-F%' THEN a.hrg_beli*a.qty ELSE 0 END as flape,
                                               CASE WHEN a.kode_periode = $gabYm AND a.kd_brg LIKE '%Z-%' THEN a.hrg_beli*a.qty ELSE 0 END as underCarriage,
                                               CASE WHEN a.kode_periode = $gabYm AND a.kd_brg IN ('WS991-W001','BD16F-W001','BD16F-W002','BD16F-W003') THEN a.qty ELSE 0 END as wrQty,
                                               CASE WHEN a.kode_periode = $gabYm AND a.kd_brg IN ('BD16F-W001','BD16F-W002','BD16F-W003','SL69O-W001','WS991-W001','WS991-W058','WS991-W060','WS991-W061','WS991-W062','WS991-W065','WS991-W071','WS991-W072','WS991-W073','WS991-W075','WS991-W076','WS991-W077','WS991-W078','WS991-W080','WS991-W081','WS991-W082') THEN a.hrg_beli*a.qty ELSE 0 END as wrNil                                              
                                        FROM tr_detail_pem_sp_bbm a
                                        LEFT JOIN mstr_fixed_asset b ON b.kode_fa = a.kd_fa 
                                        WHERE a.kd_sts = '30'
                                    ) z 
                                    GROUP BY z.kdfa, z.nmfa"));

        $array = json_decode(json_encode($getSumNilai), true);

        $fileNm = "SP-Rekap-Pemakaian-Per-Unit-".$bln."_".$thn.".xlsx";
        return Excel::download(new ExportSpRekPemPerUnit($bln,$thn,$array), $fileNm);
        
    }

}
