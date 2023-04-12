<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\MerkBrg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class MerkBrgController extends Controller
{
    public function merkBrg_browse()
    {
        $merkBrg =  MerkBrg::all();

        $data['title'] = 'Master Merk Barang';
        return view('master/merkBrg/merkBrg', $data, compact('merkBrg'));
    }

    public function merkBrg_add(Request $request)
    {
        $request->validate([
            'kode_merk_b' => 'required|unique:mstr_merk_barang',
            'nama_merk_b' => 'required',
        ]);

        $merkBrg = new MerkBrg([
            'kode_merk_b' => $request->kode_merk_b,
            'nama_merk_b' => $request->nama_merk_b,
        ]);
        $merkBrg->save();        
        return redirect()->route('merkBrg')->with('success', 'Tambah data sukses!');
    } 

}
