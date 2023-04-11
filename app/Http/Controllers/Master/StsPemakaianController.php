<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\StsPemakaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class StsPemakaianController extends Controller
{
    public function sts_pemakaian()
    {
        $stsPemakaian =  StsPemakaian::all();

        $data['title'] = 'Master Status Pemakaian';
        return view('master/stsPemakaian/stsPemakaian', $data, compact('stsPemakaian'));
    }

    public function sts_pemakaian_add(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:mstr_sts_pemakaian',
            'keterangan' => 'required',
        ]);

        $stsPemakaian = new StsPemakaian([
            'kode' => $request->kode,
            'keterangan' => $request->keterangan,
        ]);
        $stsPemakaian->save();        
        return redirect()->route('stsPemakaian')->with('success', 'Tambah data sukses!');
    } 

}
