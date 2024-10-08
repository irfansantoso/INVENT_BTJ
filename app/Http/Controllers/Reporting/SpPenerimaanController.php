<?php

namespace App\Http\Controllers\Reporting;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProcessGlobalController;
use App\Http\Controllers\ProcessQtyController;
use App\Models\TrDetailPindahGudang;
use App\Helpers\Helper;
use App\Exports\ExportSpPenerimaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class SpPenerimaanController extends Controller
{
    public function spPenerimaan(Request $request)
    {
        $bulan = Helper::bulan();
        $data['title'] = 'SP Penerimaan Reporting';
        // Buat instance dari controller lain
        $ProcessGlobalController = new ProcessGlobalController();
        $ProcessQtyController = new ProcessQtyController();

        // Panggil fungsi-fungsi yang diperlukan
        $ProcessGlobalController->processGlobal();
        $ProcessQtyController->processQty();
        return view('reporting/rpt_spPenerimaan', $data,compact('bulan'));
    }

    public function spPenerimaan_rpt(Request $request)
    {   
        // dd($request);
        // $bln = date("m", strtotime($request->bulan));
        // $thn = date("Y", strtotime($request->tahun));
        $bln = $request->bulan;
        $thn = $request->tahun;
        $kode_menu = $request->kode_menu;

        $year = substr($thn,2,2);
        $month = str_pad($bln, 2, "0", STR_PAD_LEFT);
        $gabYm = $year.$month;        

        if($kode_menu=='13'){
            $jns_menu = "Pindah Gudang";
            // $getSumNilai = DB::select(DB::raw("SELECT a.*,b.no_sppb,b.tgl_sa,b.supplier,e.ukuran,d.nama_supp FROM tr_detail_saldo_awal a 
            //                                 LEFT JOIN tr_header_saldo_awal b ON b.id = a.id_head_sa 
            //                                 LEFT JOIN import_saldo_awal c ON c.kd_brg = a.kd_brg 
            //                                 LEFT JOIN mstr_supplier d ON d.kode_supp = b.supplier
            //                                 LEFT JOIN tr_invent_stock e ON e.kd_brg = a.kd_brg 
            //                                 WHERE a.kode_periode = $gabYm and e.kel_brg not in ('MP991')"));
            $getSumNilai = DB::select(DB::raw("
                                                SELECT a.*, b.no_sppb, b.tgl_sa, b.supplier, e.ukuran, d.nama_supp
                                                FROM tr_detail_saldo_awal a
                                                LEFT JOIN tr_header_saldo_awal b ON b.id = a.id_head_sa
                                                LEFT JOIN import_saldo_awal c ON c.kd_brg = a.kd_brg
                                                LEFT JOIN mstr_supplier d ON d.kode_supp = b.supplier
                                                LEFT JOIN tr_invent_stock e ON e.kd_brg = a.kd_brg
                                                WHERE a.kode_periode = :gabYm AND e.kel_brg NOT IN ('MP991')
                                                ORDER BY b.tgl_sa ASC, b.no_sppb ASC
                                            "), ['gabYm' => $gabYm]);

            $array = json_decode(json_encode($getSumNilai), true);

            $fileNm = "SP-Penerimaan-Bulan-".$bln."_".$thn."--".$kode_menu.".xlsx";
            return Excel::download(new ExportSpPenerimaan($bln,$thn,$kode_menu,$jns_menu,$array), $fileNm);
        }elseif($kode_menu=='19'){
            $jns_menu = "Koreksi SO";
            $getSumNilai = DB::select(DB::raw("SELECT a.kd_brg,a.part_numb,a.qty,a.uom,a.hrg_satuan as harga_satuan,a.hrg_beli as total,b.no_koreksi as no_sppb,b.tgl_koreksi as tgl_sa,NULL as supplier,e.ukuran,NULL as nama_supp FROM tr_detail_koreksi_so_p a 
                                            LEFT JOIN tr_header_koreksi_so_p b ON b.id = a.id_head_koreksi_so 
                                            LEFT JOIN tr_invent_stock e ON e.kd_brg = a.kd_brg 
                                            WHERE a.kode_periode = $gabYm and e.kel_brg not in ('MP991')"));

            $array = json_decode(json_encode($getSumNilai), true);

            $fileNm = "SP-Penerimaan-Bulan-".$bln."_".$thn."--".$kode_menu.".xlsx";
            return Excel::download(new ExportSpPenerimaan($bln,$thn,$kode_menu,$jns_menu,$array), $fileNm);
        }else{
            return redirect()->route('spPenerimaan')->with('error', 'Field kode menu kosong atau tidak ada!');
        }
        
    }

}
