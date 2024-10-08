<?php

namespace App\Http\Controllers\Reporting;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProcessGlobalController;
use App\Http\Controllers\ProcessQtyController;
use App\Models\TrDetailPindahGudang;
use App\Helpers\Helper;
use App\Exports\ExportSpChainsawman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class SpChainsawmanController extends Controller
{
    public function spChainsawman(Request $request)
    {
        $bulan = Helper::bulan();
        $data['title'] = 'SP Chainsawman';
        // Buat instance dari controller lain
        $ProcessGlobalController = new ProcessGlobalController();
        $ProcessQtyController = new ProcessQtyController();

        // Panggil fungsi-fungsi yang diperlukan
        $ProcessGlobalController->processGlobal();
        $ProcessQtyController->processQty();
        return view('reporting/rpt_spChainsawman', $data,compact('bulan'));
    }

    public function spChainsawman_rpt(Request $request)
    {   
        // dd($request);
        // $bln = date("m", strtotime($request->bulan));
        // $thn = date("Y", strtotime($request->tahun));
        $bln = $request->bulan;
        $thn = $request->tahun;

        $year = substr($thn,2,2);
        $month = str_pad($bln, 2, "0", STR_PAD_LEFT);
        $gabYm = $year.$month;

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
                                               a.hrg_beli*a.qty AS h_beli,
                                               a.kd_sts AS kdsts,
                                               e.keterangan AS ket_sts,
                                               a.keterangan AS ket                              
                                        FROM tr_detail_pem_sp_bbm a 
                                        LEFT JOIN mstr_fixed_asset b ON b.kode_fa = a.kd_fa 
                                        LEFT JOIN tr_header_pemakaian_sp_bbm c ON a.id_head_p_spbbm = c.id
                                        LEFT JOIN tr_invent_stock d ON a.kd_brg = d.kd_brg 
                                        LEFT JOIN mstr_sts_pemakaian e ON a.kd_sts = e.kode 
                                        WHERE a.kd_sts = '80' and a.kode_periode = '$gabYm'
                                        
                                    ) z 
                                    GROUP BY z.id, z.kdfa, z.nmfa, z.tgl_d_p_spbbm, z.nobpm, z.kdbrg, z.partnumb, z.ukur, z.qty, z.uom, z.h_beli, z.kdsts, z.ket_sts, z.ket"));

        $array = json_decode(json_encode($getSumNilai), true);

        $fileNm = "SP-Chainsawman-".$bln."_".$thn.".xlsx";
        return Excel::download(new ExportSpChainsawman($bln,$thn,$array), $fileNm);
        
    }

}
