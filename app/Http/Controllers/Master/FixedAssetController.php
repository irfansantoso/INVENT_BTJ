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

    public function showEditFa($id)
    {        
        $showFa = FixedAsset::where('id_fa','=',$id)
                                     ->get(['*']);

        $html ='        
        <form class="form-horizontal" method="POST" action="'.route('fixedAsset.edit').'">
        '. csrf_field() .'
        <input type="hidden" value="'.$id.'" name="idM">
        <div class="card-body">
          <div class="row">            
            <div class="col-sm-2">
              <div class="form-group">
                <label>Kode FA</label>
                  <input type="text" class="form-control" id="kode_fa" name="kode_fa" value="'.$showFa[0]['kode_fa'].'" readonly>        
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>Nama FA</label>
                  <input type="text" class="form-control" id="nama_fa" name="nama_fa" value="'.$showFa[0]['nama_fa'].'">
              </div>
            </div>
                       
          </div>          
          
        </div>
        <div class="card-footer">
          <button class="btn btn-success">Simpan</button>
        </div>
        </form>';
        

        $response['html'] = $html; 
        return response()->json($response);

    }

    public function fixedAsset_edit(Request $request)
    {
        FixedAsset::where('id_fa', $request->idM)
                  ->update(['nama_fa' => $request->nama_fa,
                            'updated_at' => date('Y-m-d H:i:s')
                            ]);
        return redirect()->route('fixedAsset')->with('success', 'Edit data sukses!');
        // return back()->with('success',' Edit Data Header successfully');
    }

}
