<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\JnsAlat;
use App\Models\Merk;
use App\Models\GabJnsAlatMerk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Session;

class JnsAlatController extends Controller
{
    public function jnsAlat()
    {
        $jnsAlat =  JnsAlat::all();
        $merk =  Merk::all();
        $gabJnsAlatMerk = GabJnsAlatMerk::all();

        $data['title'] = 'Jenis Alat & Merk';
        return view('master/jnsalat_merk/jnsAlat', $data, compact('jnsAlat','merk','gabJnsAlatMerk'));
    }

    public function jnsAlat_tambah()
    {
        $jnsAlat =  JnsAlat::all();
        $merk =  Merk::all();

        $data['title'] = 'Jenis Alat & Merk';
        return view('master/jnsalat_merk/jnsAlat_tambah', $data, compact('jnsAlat','merk'));
    }

    public function jnsAlat_add(Request $request)
    {
        if($request->jenisInput=='jnsalat'){
            $request->validate([
                'kode_jnsAlat' => 'required|unique:mstr_jns_alat',
                'nama_jnsAlat' => 'required',
            ]);

            $jnsAlat = new JnsAlat([
                'kode_jnsAlat' => $request->kode_jnsAlat,
                'nama_jnsAlat' => $request->nama_jnsAlat,
            ]);
            $jnsAlat->save();

        }elseif($request->jenisInput=='merk'){
            $request->validate([
                'kode_merk' => 'required|unique:mstr_merk',
                'nama_merk' => 'required',
            ]);

            $merk = new Merk([
                'kode_merk' => $request->kode_merk,
                'nama_merk' => $request->nama_merk,
            ]);
            $merk->save();
        }elseif($request->jenisInput=='gab_jnsalat_merk'){
            $request->validate([
                'kode_jnsAlatMerk' => 'required|unique:mstr_jnsalat_merk',
                'keterangan' => 'required',
            ]);

            $gabJnsAlatMerk = new GabJnsAlatMerk([
                'kode_jnsAlatMerk' => $request->kode_jnsAlatMerk,
                'keterangan' => $request->keterangan,
            ]);
            $gabJnsAlatMerk->save();
        }

        return redirect()->route('jnsAlat_tambah')->with('success', 'Tambah data sukses!');
    }
}
