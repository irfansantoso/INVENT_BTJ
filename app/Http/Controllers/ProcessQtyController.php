<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProcessQty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class ProcessQtyController extends Controller
{
    
    public function processQty()
    {
        ProcessQty::truncate();

        DB::insert('INSERT into temp_qty (kd_brg,qty,nilai)
                    SELECT kd_brg, sum(qty_sum)-sum(qty_bbm)-sum(qty_spbbm)-sum(qty_pgspbbm)-sum(qty_rpspbbm)-sum(qty_kspbbm)+sum(qty_rp)+sum(qty_kso)+sum(qty_import_sa) as qtysum, sum(nilai_sum)-sum(nilai_bbm)-sum(nilai_spbbm)-sum(nilai_pgspbbm)-sum(nilai_rpspbbm)-sum(nilai_kspbbm)+sum(nilai_rp)+sum(nilai_kso)+sum(nilai_import_sa) as nilaisum
                    FROM 
                    (
                        select kd_brg, sum(qty) as qty_sum, 0 as qty_bbm, 0 as qty_spbbm, 0 as qty_pgspbbm, 0 as qty_rpspbbm, 0 as qty_kspbbm, 0 as qty_rp, 0 as qty_kso, 0 as qty_import_sa, sum(total) as nilai_sum, 0 as nilai_bbm, 0 as nilai_spbbm, 0 as nilai_pgspbbm, 0 as nilai_rpspbbm, 0 as nilai_kspbbm, 0 as nilai_rp, 0 as nilai_kso, 0 as nilai_import_sa
                        from tr_detail_saldo_awal
                        GROUP by kd_brg
                        union all
                        SELECT kd_brg, 0 as qty_sum, 0 as qty_bbm, sum(qty) as qty_spbbm, 0 as qty_pgspbbm, 0 as qty_rpspbbm, 0 as qty_kspbbm, 0 as qty_rp, 0 as qty_kso, 0 as qty_import_sa, 0 as nilai_sum, 0 as nilai_bbm, sum(hrg_beli*qty) as nilai_spbbm, 0 as nilai_pgspbbm, 0 as nilai_rpspbbm, 0 as nilai_kspbbm, 0 as nilai_rp, 0 as nilai_kso, 0 as nilai_import_sa
                        from tr_detail_pem_sp_bbm 
                        -- where kd_sts != "95"
                        GROUP by kd_brg
                        union all
                        SELECT kd_brg, 0 as qty_sum, 0 as qty_bbm, 0 as qty_spbbm, sum(qty) as qty_pgspbbm, 0 as qty_rpspbbm, 0 as qty_kspbbm, 0 as qty_rp, 0 as qty_kso, 0 as qty_import_sa, 0 as nilai_sum, 0 as nilai_bbm, 0 as nilai_spbbm, sum(hrg_beli*qty) as nilai_pgspbbm, 0 as nilai_rpspbbm, 0 as nilai_kspbbm, 0 as nilai_rp, 0 as nilai_kso, 0 as nilai_import_sa
                        from tr_detail_pg_sp_bbm
                        GROUP by kd_brg
                        union all
                        SELECT kd_brg, 0 as qty_sum, 0 as qty_bbm, 0 as qty_spbbm, 0 as qty_pgspbbm, sum(qty) as qty_rpspbbm, 0 as qty_kspbbm, 0 as qty_rp, 0 as qty_kso, 0 as qty_import_sa, 0 as nilai_sum, 0 as nilai_bbm, 0 as nilai_spbbm, 0 as nilai_pgspbbm, sum(hrg_beli*qty) as nilai_rpspbbm, 0 as nilai_kspbbm, 0 as nilai_rp, 0 as nilai_kso, 0 as nilai_import_sa
                        from tr_detail_rp_sp_bbm
                        GROUP by kd_brg
                        union all
                        SELECT kd_brg, 0 as qty_sum, 0 as qty_bbm, 0 as qty_spbbm, 0 as qty_pgspbbm, 0 as qty_rpspbbm, sum(qty) as qty_kspbbm, 0 as qty_rp, 0 as qty_kso, 0 as qty_import_sa, 0 as nilai_sum, 0 as nilai_bbm, 0 as nilai_spbbm, 0 as nilai_pgspbbm, 0 as nilai_rpspbbm, sum(hrg_beli*qty) as nilai_kspbbm, 0 as nilai_rp, 0 as nilai_kso, 0 as nilai_import_sa
                        from tr_detail_k_sp_bbm
                        GROUP by kd_brg
                        union all
                        SELECT kd_brg, 0 as qty_sum, sum(jumlah) as qty_bbm, 0 as qty_spbbm, 0 as qty_pgspbbm, 0 as qty_rpspbbm, 0 as qty_kspbbm, 0 as qty_rp, 0 as qty_kso, 0 as qty_import_sa, 0 as nilai_sum, sum(jumlah*hrg_beli) as nilai_bbm, 0 as nilai_spbbm, 0 as nilai_pgspbbm, 0 as nilai_rpspbbm, 0 as nilai_kspbbm, 0 as nilai_rp, 0 as nilai_kso, 0 as nilai_import_sa
                        from tr_detail_pem_bbm
                        GROUP by kd_brg
                        union all
                        SELECT kd_brg, 0 as qty_sum, 0 as qty_bbm, 0 as qty_spbbm, 0 as qty_pgspbbm, 0 as qty_rpspbbm, 0 as qty_kspbbm, sum(qty) as qty_rp, 0 as qty_kso, 0 as qty_import_sa, 0 as nilai_sum, 0 as nilai_bbm, 0 as nilai_spbbm, 0 as nilai_pgspbbm, 0 as nilai_rpspbbm, 0 as nilai_kspbbm, sum(total) as nilai_rp, 0 as nilai_kso, 0 as nilai_import_sa
                        from tr_detail_retur_pemakaian
                        GROUP by kd_brg
                        union all
                        SELECT kd_brg, 0 as qty_sum, 0 as qty_bbm, 0 as qty_spbbm, 0 as qty_pgspbbm, 0 as qty_rpspbbm, 0 as qty_kspbbm, 0 as qty_rp, sum(qty) as qty_kso, 0 as qty_import_sa, 0 as nilai_sum, 0 as nilai_bbm, 0 as nilai_spbbm, 0 as nilai_pgspbbm, 0 as nilai_rpspbbm, 0 as nilai_kspbbm, 0 as nilai_rp, sum(total) as nilai_kso, 0 as nilai_import_sa
                        from tr_detail_koreksi_so_p
                        GROUP by kd_brg
                        union all
                        SELECT kd_brg, 0 as qty_sum, 0 as qty_bbm, 0 as qty_spbbm, 0 as qty_pgspbbm, 0 as qty_rpspbbm, 0 as qty_kspbbm, 0 as qty_rp, 0 as qty_kso, sum(qty) as qty_import_sa, 0 as nilai_sum, 0 as nilai_bbm, 0 as nilai_spbbm, 0 as nilai_pgspbbm, 0 as nilai_rpspbbm, 0 as nilai_kspbbm, 0 as nilai_rp, 0 as nilai_kso, sum(nilai) as nilai_import_sa
                        from import_saldo_awal
                        where qty <> 0
                        GROUP by kd_brg
                        union all
                        select kd_brg, qty_inv as qty_sum, 0 as qty_bbm, 0 as qty_spbbm, 0 as qty_pgspbbm, 0 as qty_rpspbbm, 0 as qty_kspbbm, 0 as qty_rp, 0 as qty_kso, 0 as qty_import_sa, 0 as nilai_sum, 0 as nilai_bbm, 0 as nilai_spbbm, 0 as nilai_pgspbbm, 0 as nilai_rpspbbm, 0 as nilai_kspbbm, 0 as nilai_rp, 0 as nilai_kso, 0 as nilai_import_sa
                        from tr_invent_stock
                    ) tab_temp
                    WHERE qty_sum is not null
                    GROUP by kd_brg
                    ');

        return redirect()->route('stInvent')->with('success', '');
    }    

}
