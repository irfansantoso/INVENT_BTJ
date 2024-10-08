<?php

namespace App\Http\Controllers\Reporting;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProcessGlobalController;
use App\Http\Controllers\ProcessQtyController;
use App\Models\TrDetailPindahGudang;
use App\Helpers\Helper;
use App\Exports\ExportSpRincPemPerUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class SpRincPemPerUnitController extends Controller
{
    public function spRincPemPerUnit(Request $request)
    {
        $bulan = Helper::bulan();
        $data['title'] = 'SP Rincian Pemakaian Per Unit';
        // Buat instance dari controller lain
        $ProcessGlobalController = new ProcessGlobalController();
        $ProcessQtyController = new ProcessQtyController();

        // Panggil fungsi-fungsi yang diperlukan
        $ProcessGlobalController->processGlobal();
        $ProcessQtyController->processQty();
        return view('reporting/rpt_spRincPemPerUnit', $data,compact('bulan'));
    }

    public function spRincPemPerUnit_rpt(Request $request)
    {   
        // dd($request);
        // echo $request->start_date;exit();
        $sDt = date("d-m-Y", strtotime($request->start_date));
        $eDt = date("d-m-Y", strtotime($request->end_date));
        $sDate = $request->start_date;
        $eDate = $request->end_date;
        // $bln = $request->bulan;
        // $thn = $request->tahun;

        // $year = substr($thn,2,2);
        // $month = str_pad($bln, 2, "0", STR_PAD_LEFT);
        // $gabYm = $year.$month;

        // $getSumNilai = DB::select(DB::raw("SELECT z.kdfa, z.nmfa, z.tgl_d_p_spbbm, z.nobpm, z.kdbrg, z.partnumb, z.ukur, z.qty, z.uom, z.h_beli, z.kdsts, z.ket_sts, z.ket
        //                             FROM (
        //                                 SELECT a.kd_fa AS kdfa, 
        //                                        b.nama_fa AS nmfa,
        //                                        a.tgl_det_p_spbbm AS tgl_d_p_spbbm,
        //                                        c.no_bpm AS nobpm,
        //                                        a.kd_brg AS kdbrg,
        //                                        d.part_numb AS partnumb,
        //                                        d.ukuran AS ukur,
        //                                        a.qty AS qty,
        //                                        a.uom AS uom,
        //                                        (a.hrg_beli*a.qty) AS h_beli,
        //                                        a.kd_sts AS kdsts,
        //                                        e.keterangan AS ket_sts,
        //                                        a.keterangan AS ket                              
        //                                 FROM tr_detail_pem_sp_bbm a 
        //                                 LEFT JOIN mstr_fixed_asset b ON b.kode_fa = a.kd_fa 
        //                                 LEFT JOIN tr_header_pemakaian_sp_bbm c ON a.id_head_p_spbbm = c.id
        //                                 LEFT JOIN tr_invent_stock d ON a.kd_brg = d.kd_brg 
        //                                 LEFT JOIN mstr_sts_pemakaian e ON a.kd_sts = e.kode 
        //                                 WHERE a.kode_periode = '$gabYm' AND a.kd_sts IN ('01', '02', '03', '04', '05', '06', '30', '80', '95')

        //                                 UNION ALL

        //                                 SELECT w.kd_fa AS kdfa, 
        //                                        e.nama_fa AS nmfa,
        //                                        w.tgl_det_rp_spbbm AS tgl_d_p_spbbm,
        //                                        r.no_sppb AS nobpm,
        //                                        w.kd_brg AS kdbrg,
        //                                        t.part_numb AS partnumb,
        //                                        t.ukuran AS ukur,
        //                                        w.qty AS qty,
        //                                        w.uom AS uom,
        //                                        (w.hrg_beli*w.qty) AS h_beli,
        //                                        w.kd_sts AS kdsts,
        //                                        y.keterangan AS ket_sts,
        //                                        w.keterangan AS ket                                   
        //                                 FROM tr_detail_rp_sp_bbm w 
        //                                 LEFT JOIN mstr_fixed_asset e ON e.kode_fa = w.kd_fa 
        //                                 LEFT JOIN tr_header_rp_sp_bbm r ON w.id_head_rp_spbbm = r.id
        //                                 LEFT JOIN tr_invent_stock t ON w.kd_brg = t.kd_brg 
        //                                 LEFT JOIN mstr_sts_pemakaian y ON w.kd_sts = y.kode 
        //                                 WHERE w.kode_periode = '$gabYm' AND w.kd_sts IN ('01', '02', '03', '04', '05', '06', '30', '80', '95')

        //                                 UNION ALL

        //                                 SELECT w.kd_fa AS kdfa, 
        //                                        e.nama_fa AS nmfa,
        //                                        w.tgl_det_K_spbbm AS tgl_d_p_spbbm,
        //                                        r.no_koreksi AS nobpm,
        //                                        w.kd_brg AS kdbrg,
        //                                        t.part_numb AS partnumb,
        //                                        t.ukuran AS ukur,
        //                                        w.qty AS qty,
        //                                        w.uom AS uom,
        //                                        (w.hrg_beli*w.qty) AS h_beli,
        //                                        w.kd_sts AS kdsts,
        //                                        y.keterangan AS ket_sts,
        //                                        w.keterangan AS ket                                   
        //                                 FROM tr_detail_k_sp_bbm w 
        //                                 LEFT JOIN mstr_fixed_asset e ON e.kode_fa = w.kd_fa 
        //                                 LEFT JOIN tr_header_k_sp_bbm r ON w.id_head_k_spbbm = r.id
        //                                 LEFT JOIN tr_invent_stock t ON w.kd_brg = t.kd_brg 
        //                                 LEFT JOIN mstr_sts_pemakaian y ON w.kd_sts = y.kode 
        //                                 WHERE w.kode_periode = '$gabYm' AND w.kd_sts IN ('01', '02', '03', '04', '05', '06', '30', '80', '95')
                                        
        //                             ) z 
        //                             GROUP BY z.kdfa, z.nmfa, z.tgl_d_p_spbbm, z.nobpm, z.kdbrg, z.partnumb, z.ukur, z.qty, z.uom, z.h_beli, z.kdsts, z.ket_sts, z.ket"));

        $getSumNilai = DB::select(DB::raw("SELECT z.id, z.kdfa, z.nmfa, z.tgl_d_p_spbbm, z.nobpm, z.kdbrg, z.partnumb, z.ukur, z.qty, z.uom, z.h_beli, z.kdsts, z.ket_sts, z.ket
                                    FROM (
                                        SELECT a.id AS id,
                                               a.kd_fa AS kdfa, 
                                               b.nama_fa AS nmfa,
                                               a.tgl_det_p_spbbm AS tgl_d_p_spbbm,
                                               c.no_bpm AS nobpm,
                                               a.kd_brg AS kdbrg,
                                               d.part_numb AS partnumb,
                                               d.ukuran AS ukur,
                                               a.qty AS qty,
                                               a.uom AS uom,
                                               (a.hrg_beli*a.qty) AS h_beli,
                                               a.kd_sts AS kdsts,
                                               e.keterangan AS ket_sts,
                                               a.keterangan AS ket                              
                                        FROM tr_detail_pem_sp_bbm a 
                                        LEFT JOIN mstr_fixed_asset b ON b.kode_fa = a.kd_fa 
                                        LEFT JOIN tr_header_pemakaian_sp_bbm c ON a.id_head_p_spbbm = c.id
                                        LEFT JOIN tr_invent_stock d ON a.kd_brg = d.kd_brg 
                                        LEFT JOIN mstr_sts_pemakaian e ON a.kd_sts = e.kode 
                                        WHERE a.tgl_det_p_spbbm >= '$sDate' AND a.tgl_det_p_spbbm <= '$eDate' AND a.kd_sts IN ('01','02','03','04','05','06','30','80','82','95')

                                        UNION ALL

                                        SELECT w.id AS id,
                                               w.kd_fa AS kdfa, 
                                               e.nama_fa AS nmfa,
                                               w.tgl_det_rp_spbbm AS tgl_d_p_spbbm,
                                               r.no_sppb AS nobpm,
                                               w.kd_brg AS kdbrg,
                                               t.part_numb AS partnumb,
                                               t.ukuran AS ukur,
                                               w.qty AS qty,
                                               w.uom AS uom,
                                               (w.hrg_beli*w.qty) AS h_beli,
                                               w.kd_sts AS kdsts,
                                               y.keterangan AS ket_sts,
                                               w.keterangan AS ket                                   
                                        FROM tr_detail_rp_sp_bbm w 
                                        LEFT JOIN mstr_fixed_asset e ON e.kode_fa = w.kd_fa 
                                        LEFT JOIN tr_header_rp_sp_bbm r ON w.id_head_rp_spbbm = r.id
                                        LEFT JOIN tr_invent_stock t ON w.kd_brg = t.kd_brg 
                                        LEFT JOIN mstr_sts_pemakaian y ON w.kd_sts = y.kode 
                                        WHERE w.tgl_det_rp_spbbm >= '$sDate' AND w.tgl_det_rp_spbbm <= '$eDate' AND w.kd_sts IN ('01','02','03','04','05','06','30','80','82','95')

                                        UNION ALL

                                        SELECT w.id AS id,
                                               w.kd_fa AS kdfa, 
                                               e.nama_fa AS nmfa,
                                               w.tgl_det_K_spbbm AS tgl_d_p_spbbm,
                                               r.no_koreksi AS nobpm,
                                               w.kd_brg AS kdbrg,
                                               t.part_numb AS partnumb,
                                               t.ukuran AS ukur,
                                               w.qty AS qty,
                                               w.uom AS uom,
                                               (w.hrg_beli*w.qty) AS h_beli,
                                               w.kd_sts AS kdsts,
                                               y.keterangan AS ket_sts,
                                               w.keterangan AS ket                                   
                                        FROM tr_detail_k_sp_bbm w 
                                        LEFT JOIN mstr_fixed_asset e ON e.kode_fa = w.kd_fa 
                                        LEFT JOIN tr_header_k_sp_bbm r ON w.id_head_k_spbbm = r.id
                                        LEFT JOIN tr_invent_stock t ON w.kd_brg = t.kd_brg 
                                        LEFT JOIN mstr_sts_pemakaian y ON w.kd_sts = y.kode 
                                        WHERE w.tgl_det_k_spbbm >= '$sDate' AND w.tgl_det_k_spbbm <= '$eDate' AND w.kd_sts IN ('01','02','03','04','05','06','30','80','82','95')
                                        
                                    ) z 
                                    GROUP BY z.id, z.kdfa, z.nmfa, z.tgl_d_p_spbbm, z.nobpm, z.kdbrg, z.partnumb, z.ukur, z.qty, z.uom, z.h_beli, z.kdsts, z.ket_sts, z.ket 
                                    ORDER BY z.kdfa ASC, z.tgl_d_p_spbbm ASC"));


        $array = json_decode(json_encode($getSumNilai), true);

        $fileNm = "SP-Rincian-Pemakaian-Per-Unit-".$sDt."_SD_".$eDt.".xlsx";
        return Excel::download(new ExportSpRincPemPerUnit($sDt,$eDt,$array), $fileNm);
        
    }

}
