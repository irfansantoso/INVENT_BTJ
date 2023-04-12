<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class WarehouseController extends Controller
{
    public function warehouse_browse()
    {
        $warehouse =  Warehouse::all();

        $data['title'] = 'Master Warehouse';
        return view('master/warehouse/warehouse', $data, compact('warehouse'));
    }

    public function warehouse_add(Request $request)
    {
        $request->validate([
            'kode_wh' => 'required|unique:mstr_warehouse',
            'nama_wh' => 'required',
        ]);

        $warehouse = new Warehouse([
            'kode_wh' => $request->kode_wh,
            'nama_wh' => $request->nama_wh,
        ]);
        $warehouse->save();        
        return redirect()->route('warehouse')->with('success', 'Tambah data sukses!');
    } 

}
