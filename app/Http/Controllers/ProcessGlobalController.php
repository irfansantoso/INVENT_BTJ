<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProcessGlobal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class ProcessGlobalController extends Controller
{
    
    public function processGlobal()
    {
        ProcessGlobal::truncate();

        DB::insert('INSERT into temp_reporting (kd_brg,kel_brg,nm_brg,ukuran,satuan,qty,nilai,kode_periode,from_table)
                    SELECT kd_brg,kel_brg,nm_brg,ukuran,satuan,qty,nilai,kode_periode,from_table
                    FROM 
                    (
                        select kd_brg, kel_brg, nm_brg, ukuran, satuan, qty, nilai, kode_periode, "import" as from_table
                        from import_saldo_awal
                        union all
                        select kd_brg, SUBSTRING(kd_brg, 1, 5) as kel_brg, part_numb as nm_brg, NULL as ukuran, uom as satuan, qty, total as nilai, kode_periode, "PindahGudang" as from_table
                        from tr_detail_saldo_awal
                        union all
                        select kd_brg, SUBSTRING(kd_brg, 1, 5) as kel_brg, part_numb as nm_brg, NULL as ukuran, uom as satuan, qty, total as nilai, kode_periode, "Retur" as from_table
                        from tr_detail_retur_pemakaian
                        union all
                        select kd_brg, SUBSTRING(kd_brg, 1, 5) as kel_brg, part_numb as nm_brg, NULL as ukuran, uom as satuan, qty, CAST(hrg_satuan*qty AS DECIMAL(14,2)) as nilai, kode_periode, "KoreksiSO" as from_table
                        from tr_detail_koreksi_so_p
                        union all
                        select kd_brg, SUBSTRING(kd_brg, 1, 5) as kel_brg, NULL as nm_brg, NULL as ukuran, uom as satuan, qty, CAST(hrg_beli*qty AS DECIMAL(14,2)) as nilai, kode_periode, "PemSpBbm" as from_table
                        from tr_detail_pem_sp_bbm
                        -- WHERE kd_sts in ("01","02","03","04","05","06","30","80","81","82","90","95")
                        -- where kd_sts != "95"
                        union all
                        select kd_brg, SUBSTRING(kd_brg, 1, 5) as kel_brg, NULL as nm_brg, NULL as ukuran, uom as satuan, qty, CAST(hrg_beli*qty AS DECIMAL(14,2)) as nilai, kode_periode, "PemPinGudSpBbm" as from_table
                        from tr_detail_pg_sp_bbm
                        union all
                        select kd_brg, SUBSTRING(kd_brg, 1, 5) as kel_brg, NULL as nm_brg, NULL as ukuran, uom as satuan, qty, CAST(hrg_beli*qty AS DECIMAL(14,2)) as nilai, kode_periode, "ReturPemSpBbm" as from_table
                        from tr_detail_rp_sp_bbm 
                        union all
                        select kd_brg, SUBSTRING(kd_brg, 1, 5) as kel_brg, nm_brg as nm_brg, NULL as ukuran, uom as satuan, qty, CAST(hrg_beli*qty AS DECIMAL(14,2)) as nilai, kode_periode, "KoreksiPemSpBbm" as from_table
                        from tr_detail_k_sp_bbm
                        union all
                        select kd_brg, SUBSTRING(kd_brg, 1, 5) as kel_brg, NULL as nm_brg, NULL as ukuran, uom as satuan, jumlah as qty, CAST(hrg_beli*jumlah AS DECIMAL(14,2)) as nilai, kode_periode, "PemBbm" as from_table
                        from tr_detail_pem_bbm 
                        where sts_pakai != "95"                 
                    ) tab_temp
                    ');

        return redirect()->route('stInvent')->with('success', '');
    }    

}
