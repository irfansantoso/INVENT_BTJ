<?php

namespace App\Http\Controllers\Reporting;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProcessGlobalController;
use App\Http\Controllers\ProcessQtyController;
use App\Models\TrDetailPindahGudang;
use App\Helpers\Helper;
use App\Exports\ExportBbmPenerimaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class BbmPenerimaanController extends Controller
{
    public function bbmPenerimaan(Request $request)
    {
        $bulan = Helper::bulan();
        $data['title'] = 'BBM Penerimaan Reporting';
        // Buat instance dari controller lain
        $ProcessGlobalController = new ProcessGlobalController();
        $ProcessQtyController = new ProcessQtyController();

        // Panggil fungsi-fungsi yang diperlukan
        $ProcessGlobalController->processGlobal();
        $ProcessQtyController->processQty();
        return view('reporting/rpt_bbmPenerimaan', $data,compact('bulan'));
    }

    public function bbmPenerimaan_rpt(Request $request)
    {   
        // dd($request);
        // $bln = date("m", strtotime($request->bulan));
        // $thn = date("Y", strtotime($request->tahun));
        $bln = $request->bulan;
        $thn = $request->tahun;

        $year = substr($thn,2,2);
        $month = str_pad($bln, 2, "0", STR_PAD_LEFT);
        $gabYm = $year.$month;        

        $getSumNilai = DB::select(DB::raw("SELECT a.*,b.no_sppb,b.supplier,c.ukuran,d.nama_supp FROM tr_detail_saldo_awal a 
                                        LEFT JOIN tr_header_saldo_awal b ON b.id = a.id_head_sa 
                                        LEFT JOIN import_saldo_awal c ON c.kd_brg = a.kd_brg 
                                        LEFT JOIN mstr_supplier d ON d.kode_supp = b.supplier 
                                        LEFT JOIN tr_invent_stock e ON e.kd_brg = a.kd_brg 
                                        WHERE a.kode_periode = $gabYm and e.kel_brg in ('MP991')"));

        $array = json_decode(json_encode($getSumNilai), true);

        $fileNm = "BBM-Penerimaan-".$bln."_".$thn.".xlsx";
        return Excel::download(new ExportBbmPenerimaan($bln,$thn,$array), $fileNm);
        
    }

}
