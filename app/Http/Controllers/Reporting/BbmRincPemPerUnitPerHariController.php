<?php

namespace App\Http\Controllers\Reporting;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProcessGlobalController;
use App\Http\Controllers\ProcessQtyController;
use App\Helpers\Helper;
use App\Exports\ExportBbmRincPemPerUnitPerHari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Session;

class BbmRincPemPerUnitPerHariController extends Controller
{
    public function bbmRincPemPerUnitPerHari(Request $request)
    {
        $dateNow = Carbon::now();
        $dtNow = date("Y-m-d", strtotime($dateNow));
        $data['title'] = 'BBM Rincian Pemakaian Per Unit Per Hari';
        // Buat instance dari controller lain
        $ProcessGlobalController = new ProcessGlobalController();
        $ProcessQtyController = new ProcessQtyController();

        // Panggil fungsi-fungsi yang diperlukan
        $ProcessGlobalController->processGlobal();
        $ProcessQtyController->processQty();
        return view('reporting/rpt_bbmRincPemPerUnitPerHari', $data,compact('dtNow'));
    }

    public function bbmRincPemPerUnitPerHari_rpt(Request $request)
    {   
 
        $awDt = date("Y-m-d", strtotime($request->tgl_awal));
        $akDt = date("Y-m-d", strtotime($request->tgl_akhir));

        if($request->stsPakai == "all"){
            $querySts = "a.tgl_det_p_spbbm >='".$awDt."' and a.tgl_det_p_spbbm <='".$akDt."'";
            $querySts_2 = "a.tgl_det_p_bbm >='".$awDt."' and a.tgl_det_p_bbm <='".$akDt."'";
        }else{
            $querySts = "a.kd_sts = '".$request->stsPakai."' and a.tgl_det_p_spbbm >='".$awDt."' and a.tgl_det_p_spbbm <='".$akDt."'";
            $querySts_2 = "a.sts_pakai = '".$request->stsPakai."' and a.tgl_det_p_bbm >='".$awDt."' and a.tgl_det_p_bbm <='".$akDt."'";
        }

        $getSumNilai = DB::select(DB::raw("SELECT z.nodoc, z.nmfa, z.tgl, z.kdbrg, z.nmbrg, z.ukur, z.quantity, z.satuan, z.nilai, z.sts, z.pemakaian, z.ket, z.hkawal, z.hkakhir, z.jamkrj, z.rata2, z.kdlok, z.nmlok, z.kdactiv, z.activalat
                                    FROM (SELECT
                                        a.tgl_det_p_spbbm as tgl,
                                        a.kd_fa as nodoc,
                                        d.nama_fa as nmfa,
                                        a.kd_brg as kdbrg,
                                        b.part_numb as nmbrg,
                                        b.ukuran as ukur,
                                        a.qty as quantity,
                                        a.uom as satuan,
                                        (a.hrg_beli * a.qty) as nilai,
                                        a.kd_sts as sts,
                                        c.keterangan as pemakaian,
                                        0 as hkawal,
                                        0 as hkakhir,
                                        0 as jamkrj,
                                        0 as rata2,
                                        NULL as kdlok,
                                        NULL as nmlok,
                                        NULL as kdactiv,
                                        NULL as activalat,
                                        a.keterangan as ket 
                                    FROM tr_detail_pem_sp_bbm a 
                                    LEFT JOIN tr_invent_stock b ON b.kd_brg = a.kd_brg
                                    LEFT JOIN mstr_sts_pemakaian c ON c.kode = a.kd_sts
                                    LEFT JOIN mstr_fixed_asset d ON d.kode_fa = a.kd_fa
                                    WHERE $querySts and b.kel_brg in ('MP991')
                                    
                                    UNION
                                    
                                    SELECT
                                        a.tgl_det_p_bbm as tgl,
                                        a.kd_fa as nodoc,
                                        f.nama_fa as nmfa,
                                        a.kd_brg as kdbrg,
                                        b.part_numb as nmbrg,
                                        b.ukuran as ukur,
                                        a.jumlah as quantity,
                                        a.uom as satuan,
                                        (a.hrg_beli * a.jumlah) as nilai,
                                        a.sts_pakai as sts,
                                        c.keterangan as pemakaian,
                                        a.hmkm_awal as hkawal,
                                        a.hmkm_akhir as hkakhir,
                                        (a.hmkm_akhir - a.hmkm_awal) as jamkrj,
                                        (a.jumlah / (a.hmkm_akhir - a.hmkm_awal)) as rata2,
                                        a.kode_lokasi as kdlok,
                                        d.nama_lokasi as nmlok,
                                        a.kode_akv as kdactiv,
                                        e.nama_akv as activalat,
                                        a.keterangan as ket 
                                    FROM tr_detail_pem_bbm a 
                                    LEFT JOIN tr_invent_stock b ON b.kd_brg = a.kd_brg
                                    LEFT JOIN mstr_sts_pemakaian c ON c.kode = a.sts_pakai
                                    LEFT JOIN mstr_lokasi d ON d.kode_lokasi = a.kode_lokasi
                                    LEFT JOIN mstr_aktivitas e ON e.kode_akv = a.kode_akv
                                    LEFT JOIN mstr_fixed_asset f ON f.kode_fa = a.kd_fa
                                    WHERE $querySts_2 and b.kel_brg in ('MP991')
                                    ) z 
                                    GROUP BY z.nodoc, z.nmfa, z.tgl, z.kdbrg, z.nmbrg, z.ukur, z.quantity, z.satuan, z.nilai, z.sts, z.pemakaian, z.ket, z.hkawal, z.hkakhir, z.jamkrj, z.rata2, z.kdlok, z.nmlok, z.kdactiv, z.activalat"));

        $array = json_decode(json_encode($getSumNilai), true);        

        $fileNm = "BBM-Rincian-Pemakaian-Per-Unit-Per-Hari(".$awDt."_".$akDt.").xlsx";
        return Excel::download(new ExportBbmRincPemPerUnitPerHari($awDt,$akDt,$array), $fileNm);
        
    }

}
