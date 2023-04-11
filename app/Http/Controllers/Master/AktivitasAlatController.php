<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\AktivitasAlat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AktivitasAlatController extends Controller
{
    public function aktivitasAlat()
    {
        $aktivitasAlat =  AktivitasAlat::all();

        $data['title'] = 'Aktivitas Alat';
        return view('master/aktivitasAlat/aktivitasAlat', $data, compact('aktivitasAlat'));
    }

    public function aktivitasAlat_add(Request $request)
    {
        $request->validate([
            'kode_akv' => 'required|unique:mstr_aktivitas',
            'nama_akv' => 'required',
        ]);

        $aktivitasAlat = new AktivitasAlat([
            'kode_akv' => $request->kode_akv,
            'nama_akv' => $request->nama_akv,
            'cat_akv' => $request->cat_akv,
        ]);
        $aktivitasAlat->save();
        return redirect()->route('aktivitasAlat')->with('success', 'Tambah data sukses!');
    }

}
