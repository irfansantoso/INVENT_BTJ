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

        DB::insert('INSERT into temp_qty (kd_brg,qty)
                    SELECT kd_brg, sum(qty_sum) as qtysum
                    FROM 
                    (
                        select kd_brg, sum(qty) as qty_sum
                        from tr_detail_saldo_awal
                        GROUP by kd_brg
                        union all
                        select kd_brg, qty_inv as qty_sum
                        from tr_invent_stock
                    ) tab_temp
                    WHERE qty_sum is not null
                    GROUP by kd_brg
                    ');

        return redirect()->route('stInvent')->with('success', 'Process Qty Sukses!');
    }    

}
