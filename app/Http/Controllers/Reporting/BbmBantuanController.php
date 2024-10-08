<?php

namespace App\Http\Controllers\Reporting;

use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Exports\ExportBbmBantuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class BbmBantuanController extends Controller
{
    public function bbmBantuan(Request $request)
    {
        $bulan = Helper::bulan();
        $data['title'] = 'BBM Bantuan Reporting';
        return view('reporting/rpt_bbmBantuan', $data,compact('bulan'));
    }

    public function bbmBantuan_rpt(Request $request)
    {   
        // dd($request);
        // $bln = date("m", strtotime($request->bulan));
        // $thn = date("Y", strtotime($request->tahun));
        $bln = $request->bulan;
        $thn = $request->tahun;

        $year = substr($thn,2,2);
        $month = str_pad($bln, 2, "0", STR_PAD_LEFT);
        $gabYm = $year.$month;        

        $getSumNilai = DB::select(DB::raw("SELECT a.*,a.hrg_beli*a.qty as totHrg,b.no_bpm,c.ukuran,d.nama_fa,e.part_numb,f.keterangan as ket FROM tr_detail_pem_sp_bbm a 
                                        LEFT JOIN tr_header_pemakaian_sp_bbm b ON b.id = a.id_head_p_spbbm 
                                        LEFT JOIN mstr_fixed_asset d ON d.kode_fa = a.kd_fa
                                        LEFT JOIN import_saldo_awal c ON c.kd_brg = a.kd_brg 
                                        LEFT JOIN tr_invent_stock e ON e.kd_brg = a.kd_brg
                                        LEFT JOIN mstr_sts_pemakaian f ON f.kode = a.kd_sts 
                                        WHERE a.kode_periode = $gabYm and a.kd_sts = '90' and e.kel_brg in ('MP991')"));

        $array = json_decode(json_encode($getSumNilai), true);

        $fileNm = "BBM-Bantuan-".$bln."_".$thn.".xlsx";
        return Excel::download(new ExportBbmBantuan($bln,$thn,$array), $fileNm);
        
    }

}
