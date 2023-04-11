<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class LokasiController extends Controller
{
    public function lokasi()
    {
        $lokasi =  Lokasi::all();

        $data['title'] = 'Master Lokasi';
        return view('master/lokasi/lokasi', $data, compact('lokasi'));
    }

    public function lokasi_add(Request $request)
    {
        $request->validate([
            'kode_lokasi' => 'required|unique:mstr_lokasi',
            'nama_lokasi' => 'required',
        ]);

        $lokasi = new Lokasi([
            'kode_lokasi' => $request->kode_lokasi,
            'nama_lokasi' => $request->nama_lokasi,
        ]);
        $lokasi->save();        
        return redirect()->route('lokasi')->with('success', 'Tambah data sukses!');
    } 

}
