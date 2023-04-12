<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class SupplierController extends Controller
{
    public function supplier_browse()
    {
        $supplier =  Supplier::all();

        $data['title'] = 'Master Supplier';
        return view('master/supplier/supplier', $data, compact('supplier'));
    }

    public function supplier_add(Request $request)
    {
        $request->validate([
            'kode_supp' => 'required|unique:mstr_supplier',
            'nama_supp' => 'required',
        ]);

        $supplier = new Supplier([
            'kode_supp' => $request->kode_supp,
            'nama_supp' => $request->nama_supp,
            'alamat_supp' => $request->alamat_supp,
            'kota_supp' => $request->kota_supp,
            'pic_supp' => $request->pic_supp
        ]);
        $supplier->save();        
        return redirect()->route('supplier')->with('success', 'Tambah data sukses!');
    } 

}
