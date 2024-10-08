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
                                               CASE WHEN a.kode_periode = $gabYm AND a.kd_sts in ('30') THEN a.hrg_beli*a.qty ELSE 0 END as spart,
                                               CASE WHEN a.kode_periode = $gabYm AND a.kd_sts='02' THEN a.qty ELSE 0 END as jumBanLuar,
                                               CASE WHEN a.kode_periode = $gabYm AND a.kd_sts='02' THEN a.hrg_beli*a.qty ELSE 0 END as banLuar,
                                               CASE WHEN a.kode_periode = $gabYm AND a.kd_sts='01' THEN a.hrg_beli*a.qty ELSE 0 END as banDalam,
                                               CASE WHEN a.kode_periode = $gabYm AND a.kd_sts='03' THEN a.hrg_beli*a.qty ELSE 0 END as flape,
                                               CASE WHEN a.kode_periode = $gabYm AND a.kd_sts='04' THEN a.hrg_beli*a.qty ELSE 0 END as underCarriage,
                                               CASE WHEN a.kode_periode = $gabYm AND a.kd_sts='05' THEN a.qty ELSE 0 END as wrQty,
                                               CASE WHEN a.kode_periode = $gabYm AND a.kd_sts='05' THEN a.hrg_beli*a.qty ELSE 0 END as wrNil                                              
                                        FROM tr_detail_pem_sp_bbm a
                                        LEFT JOIN mstr_fixed_asset b ON b.kode_fa = a.kd_fa 
                                        WHERE a.kd_sts IN ('01', '02', '03', '04', '05', '06', '30')
                                    ) z 
                                    GROUP BY z.kdfa, z.nmfa"));

        $array = json_decode(json_encode($getSumNilai), true);

        $fileNm = "SP-Rekap-Pemakaian-Per-Unit-".$bln."_".$thn.".xlsx";
        return Excel::download(new ExportSpRekPemPerUnit($bln,$thn,$array), $fileNm);
        
    }

}
