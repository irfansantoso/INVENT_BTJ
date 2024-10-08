<?php

namespace App\Http\Controllers\Reporting;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProcessGlobalController;
use App\Http\Controllers\ProcessQtyController;
use App\Models\StInvent;
use App\Models\ProcessGlobal;
use App\Helpers\Helper;
use App\Exports\ExportSpRekMuStok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class SpRekMuStokController extends Controller
{
    public function spRekMuStok(Request $request)
    {
        $bulan = Helper::bulan();
        $data['title'] = 'Rekap Mutasi Stok';
        // Buat instance dari controller lain
        $ProcessGlobalController = new ProcessGlobalController();
        $ProcessQtyController = new ProcessQtyController();

        // Panggil fungsi-fungsi yang diperlukan
        $ProcessGlobalController->processGlobal();
        $ProcessQtyController->processQty();
        return view('reporting/rpt_spRekMuStok', $data,compact('bulan'));
    }

    public function spRekMuStok_rpt(Request $request)
    {   
        // dd($request);
        // $bln = date("m", strtotime($request->bulan));
        // $thn = date("Y", strtotime($request->tahun));
        $bln = $request->bulan;
        $thn = $request->tahun;
        // $getSumNilai = StInvent::leftJoin('mstr_jnsalat_merk_2 as mjam', 'mjam.kode_jnsAlatMerk','=','tr_invent_stock.kel_brg')
        //                          ->groupBy(['tr_invent_stock.kel_brg','mjam.keterangan'])
        //                          ->get(['tr_invent_stock.kel_brg as kel_brg','mjam.keterangan as ketUnit']);

        // $getSumNilai = ProcessGlobal::select('kel_brg','mjam.keterangan as ketUnit', \DB::raw('SUM(nilai) as saldoAwal'))
        //                 ->leftJoin('mstr_jnsalat_merk_2 as mjam', 'mjam.kode_jnsAlatMerk','=','temp_reporting.kel_brg')
        //                 ->groupBy('kel_brg','mjam.keterangan')
        //                 ->get();
        $year = substr($thn,2,2);
        $month = str_pad($bln, 2, "0", STR_PAD_LEFT);
        $gabYm = $year.$month;        

        $getSumNilai = DB::select(DB::raw("SELECT z.kelbrg, k.keterangan AS ketUnit,
                                           SUM(z.saldoAwal)-SUM(z.pengeluaran1) AS saldoAwal, 
                                           SUM(z.penerimaan) AS penerimaan,
                                           SUM(z.pengeluaran2) AS pengeluaran,
                                           SUM(z.saldoAkhir)-SUM(z.pengeluaran3) AS saldoAkhir
                                    FROM (
                                        SELECT a.kel_brg AS kelbrg, 
                                               b.keterangan AS ketUnit,
                                               CASE WHEN a.kode_periode < $gabYm AND a.from_table IN ('import','PindahGudang','Retur','KoreksiSO')THEN a.nilai ELSE 0 END as saldoAwal, 
                                               CASE WHEN a.kode_periode = $gabYm AND a.from_table IN ('import','PindahGudang','Retur','KoreksiSO')THEN a.nilai ELSE 0 END as penerimaan,
                                               CASE WHEN a.kode_periode < $gabYm AND a.from_table IN ('PemSpBbm','PemPinGudSpBbm','ReturPemSpBbm','KoreksiPemSpBbm')THEN a.nilai ELSE 0 END as pengeluaran1,
                                               CASE WHEN a.kode_periode = $gabYm AND a.from_table IN ('PemSpBbm','PemPinGudSpBbm','ReturPemSpBbm','KoreksiPemSpBbm')THEN a.nilai ELSE 0 END as pengeluaran2,
                                               CASE WHEN a.kode_periode <= $gabYm AND a.from_table IN ('PemSpBbm','PemPinGudSpBbm','ReturPemSpBbm','KoreksiPemSpBbm')THEN a.nilai ELSE 0 END as pengeluaran3,
                                               CASE WHEN a.kode_periode <= $gabYm AND a.from_table IN ('import','PindahGudang','Retur','KoreksiSO')THEN a.nilai ELSE 0 END as saldoAkhir
                                        FROM temp_reporting a
                                        LEFT JOIN mstr_jnsalat_merk_2 b ON b.kode_jnsAlatMerk = a.kel_brg
                                    ) z 
                                    LEFT JOIN mstr_jnsalat_merk_2 k ON z.kelbrg = k.kode_jnsAlatMerk
                                    WHERE k.kode_jnsAlatMerk <> '' and z.kelbrg <> 'MP991'
                                    GROUP BY z.kelbrg, k.keterangan"));
        $array = json_decode(json_encode($getSumNilai), true);

        $fileNm = "SP Rekap Mutasi Stok ".$bln."_".$thn.".xlsx";
        return Excel::download(new ExportSpRekMuStok($bln,$thn,$array), $fileNm);
        
    }

}
