<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\FixedAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class FixedAssetController extends Controller
{
    public function fixedAsset()
    {
        $fixedAsset =  FixedAsset::all();

        $data['title'] = 'Fixed Asset';
        return view('master/fixedAsset/fixedAsset', $data, compact('fixedAsset'));
    }

    public function fixedAsset_add(Request $request)
    {
        $request->validate([
            'kode_fa' => 'required|unique:mstr_fixed_asset',
            'nama_fa' => 'required',
        ]);

        $fixedAsset = new FixedAsset([
            'kode_fa' => $request->kode_fa,
            'nama_fa' => $request->nama_fa,
        ]);
        $fixedAsset->save();
        return redirect()->route('fixedAsset')->with('success', 'Tambah data sukses!');
    }

}
