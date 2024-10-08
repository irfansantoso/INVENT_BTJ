<?php

namespace App\Http\Controllers\Reporting;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProcessGlobalController;
use App\Http\Controllers\ProcessQtyController;
use App\Models\StInvent;
use App\Models\ProcessGlobal;
use App\Helpers\Helper;
use App\Exports\ExportBbmRekMuStok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class BbmRekMuStokController extends Controller
{
    public function bbmRekMuStok(Request $request)
    {
        $bulan = Helper::bulan();
        $data['title'] = 'BBM Rekap Mutasi Stok';
        // Buat instance dari controller lain
        $ProcessGlobalController = new ProcessGlobalController();
        $ProcessQtyController = new ProcessQtyController();

        // Panggil fungsi-fungsi yang diperlukan
        $ProcessGlobalController->processGlobal();
        $ProcessQtyController->processQty();

        return view('reporting/rpt_bbmRekMuStok', $data,compact('bulan'));
    }

    public function bbmRekMuStok_rpt(Request $request)
    {   
        // dd($request);
        // $bln = date("m", strtotime($request->bulan));
        // $thn = date("Y", strtotime($request->tahun));
        $bln = $request->bulan;
        $thn = $request->tahun;

        $year = substr($thn,2,2);
        $month = str_pad($bln, 2, "0", STR_PAD_LEFT);
        $gabYm = $year.$month;        

        $getSumNilai = DB::select(DB::raw("SELECT z.kel_brg, z.kd_brg, z.nm_brg as nmbrg, z.ukuran as ukuran, z.satuan as satuan,
                                           SUM(z.saQty)-SUM(z.pengeluaran1Qty) AS saQty,
                                           SUM(z.saldoAwal)-SUM(z.pengeluaran1) AS saldoAwal, 
                                           SUM(z.penerimaanQty) AS penerimaanQty,
                                           SUM(z.penerimaan) AS penerimaan,
                                           SUM(z.pengeluaran2Qty) AS pengeluaranQty,
                                           SUM(z.pengeluaran2) AS pengeluaran,
                                           -- CASE WHEN ((((SUM(z.saldoAwal)-SUM(z.pengeluaran1)) + SUM(z.penerimaan)) / ((SUM(z.saQty)-SUM(z.pengeluaran1Qty)) + SUM(z.penerimaanQty))) * SUM(z.pengeluaran2Qty)) > 0
                                           --      THEN ((((SUM(z.saldoAwal)-SUM(z.pengeluaran1)) + SUM(z.penerimaan)) / ((SUM(z.saQty)-SUM(z.pengeluaran1Qty)) + SUM(z.penerimaanQty))) * SUM(z.pengeluaran2Qty))
                                           --      ELSE 0 END AS pengeluaran,
                                           ((SUM(z.saQty)-SUM(z.pengeluaran1Qty))+SUM(z.penerimaanQty))-SUM(z.pengeluaran2Qty) AS saldoAkhirQty,
                                           -- SUM(z.saldoAkhirQty)-SUM(z.pengeluaran3Qty) AS saldoAkhirQty,
                                           ((SUM(z.saldoAwal)-SUM(z.pengeluaran1))+SUM(z.penerimaan))-SUM(z.pengeluaran2) AS saldoAkhir
                                           -- CASE WHEN SUM(z.pengeluaran2Qty) > 0 
                                           --      THEN ((((SUM(z.saldoAwal)-SUM(z.pengeluaran1)) + SUM(z.penerimaan)) / ((SUM(z.saQty)-SUM(z.pengeluaran1Qty)) + SUM(z.penerimaanQty))) * SUM(z.pengeluaran2Qty))-((SUM(z.saldoAwal)-SUM(z.pengeluaran1)) + SUM(z.penerimaan))
                                           --      ELSE 
                                           --          CASE WHEN ((SUM(z.saldoAwal)-SUM(z.pengeluaran1)) + SUM(z.penerimaan)) > 0
                                           --          THEN ((SUM(z.saldoAwal)-SUM(z.pengeluaran1)) + SUM(z.penerimaan))
                                           --          ELSE 0 END
                                           --      END AS saldoAkhir 
                                    FROM (
                                        SELECT a.kd_brg AS kd_brg, a.nm_brg AS nm_brg, a.ukuran as ukuran, a.satuan as satuan, a.kel_brg, 
                                               CASE WHEN a.kode_periode < $gabYm AND a.from_table IN ('import','PindahGudang','Retur','KoreksiSO') THEN a.qty ELSE 0.00 END as saQty,
                                               CASE WHEN a.kode_periode < $gabYm AND a.from_table IN ('import','PindahGudang','Retur','KoreksiSO') THEN a.nilai ELSE 0.00 END as saldoAwal,
                                               CASE WHEN a.kode_periode = $gabYm AND a.from_table IN ('import','PindahGudang','Retur','KoreksiSO') THEN a.qty ELSE 0.00 END as penerimaanQty,
                                               CASE WHEN a.kode_periode = $gabYm AND a.from_table IN ('import','PindahGudang','Retur','KoreksiSO') THEN a.nilai ELSE 0.00 END as penerimaan,
                                               CASE WHEN a.kode_periode < $gabYm AND a.from_table IN ('PemSpBbm','PemPinGudSpBbm','ReturPemSpBbm','KoreksiPemSpBbm','PemBbm') THEN a.qty ELSE 0.00 END as pengeluaran1Qty,
                                               CASE WHEN a.kode_periode < $gabYm AND a.from_table IN ('PemSpBbm','PemPinGudSpBbm','ReturPemSpBbm','KoreksiPemSpBbm','PemBbm') THEN a.nilai ELSE 0.00 END as pengeluaran1,
                                               CASE WHEN a.kode_periode = $gabYm AND a.from_table IN ('PemSpBbm','PemPinGudSpBbm','ReturPemSpBbm','KoreksiPemSpBbm','PemBbm') THEN a.qty ELSE 0.00 END as pengeluaran2Qty,
                                               CASE WHEN a.kode_periode = $gabYm AND a.from_table IN ('PemSpBbm','PemPinGudSpBbm','ReturPemSpBbm','KoreksiPemSpBbm','PemBbm') THEN a.nilai ELSE 0.00 END as pengeluaran2,
                                               CASE WHEN a.kode_periode <= $gabYm AND a.from_table IN ('PemSpBbm','PemPinGudSpBbm','ReturPemSpBbm','KoreksiPemSpBbm','PemBbm') THEN a.qty ELSE 0.00 END as pengeluaran3Qty,
                                               CASE WHEN a.kode_periode <= $gabYm AND a.from_table IN ('import','PindahGudang','Retur','KoreksiSO') THEN a.qty ELSE 0.00 END as saldoAkhirQty,
                                               CASE WHEN a.kode_periode <= $gabYm AND a.from_table IN ('import','PindahGudang','Retur','KoreksiSO') THEN a.nilai ELSE 0.00 END as saldoAkhir
                                        FROM temp_reporting a
                                        LEFT JOIN mstr_jnsalat_merk_2 b ON b.kode_jnsAlatMerk = a.kel_brg
                                    ) z
                                    WHERE z.kel_brg = 'MP991'
                                    GROUP BY z.kel_brg, z.kd_brg"));
        $array = json_decode(json_encode($getSumNilai), true);        

        $fileNm = "BBM Rekap Mutasi Stok ".$bln."_".$thn.".xlsx";
        return Excel::download(new ExportBbmRekMuStok($bln,$thn,$array), $fileNm);
        
    }

}
