<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StInvent;
use App\Models\GabJnsAlatMerk;
use App\Models\MerkBrg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Session;

class StInventController extends Controller
{
    public function stInvent()
    {
        $stInvent =  StInvent::all();

        $gabJnsAlatMerk = GabJnsAlatMerk::all();
        $merkBrg = MerkBrg::all();

        $data['title'] = 'Stock Invent';
        return view('transaction/stInvent', $data, compact('stInvent','gabJnsAlatMerk','merkBrg'));
    }

    public function stInvent_data(Request $request)
    {
        // $data = StInvent::query();
      $data = DB::table(DB::raw("(SELECT tr_invent_stock.*,temp_qty.qty as qty FROM tr_invent_stock LEFT JOIN temp_qty ON tr_invent_stock.kd_brg = temp_qty.kd_brg) as tis"));
      // $data = StInvent::leftJoin('temp_qty as tq', 'tq.kd_brg','=','tr_invent_stock.kd_brg')
      //                               ->get(['tr_invent_stock.*','tq.qty as qty']);

        return Datatables::of($data)
                ->setTotalRecords(100)
                ->addIndexColumn()
                ->addColumn('action', function($data){

                    if(Auth::user()->level == "administrator"){
                    $btn = '<a href="#" data-toggle="modal"
                                data-target="#modalEdit"
                                data-id="'.$data->id.'"
                                class="edit btn btn-primary btn-sm editStInvent" title="Edit"><i class="far fa-edit"></i></a>';
                    $btn .= '<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id.'" data-kode="'.$data->kd_brg.'" class="btn btn-danger btn-sm delStInvent" title="Delete"><i class="fa fa-trash"></i></a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                // ->toJson();
                ->make(true);
    }

    public function stInvent_add(Request $request)
    {
        $request->validate([
            'kd_brg' => 'required|unique:tr_invent_stock',
            'kel_brg' => 'required',
        ]);

        $stInvent = new StInvent([
            'kd_brg' => $request->kd_brg,
            'kel_brg' => $request->kel_brg,
            'part_numb' => $request->part_numb,
            'ukuran' => $request->ukuran,
            'uom' => $request->uom,
            'merk' => $request->merk,
            'status' => $request->status
        ]);
        $stInvent->save();
        return redirect()->route('stInvent')->with('success', 'Tambah data sukses!');
    }

    public function showEdit($id)
    {                                                 
        $stcInvent = StInvent::find($id);
        $gabJnsAlatMerk = GabJnsAlatMerk::all();
        $merkBrg = MerkBrg::all();
        $list_kel_brg['']='-- Kel Brg --';
        $list_merk['']='-- Merk --';
        foreach ($gabJnsAlatMerk as $row) 
        {
            $list_kel_brg[$row->kode_jnsAlatMerk] = $row->kode_jnsAlatMerk;  
        }

        foreach ($merkBrg as $row) 
        {
            $list_merk[$row->kode_merk_b] = $row->kode_merk_b;  
        }

        $html ='
        
        <form class="form-horizontal" method="POST" action="'.route('stInvent.edit').'">
        '. csrf_field() .'
        <input type="hidden" value="'.$id.'" name="idM">
        <div class="card-body">          
          <div class="row">            
            <div class="col-sm-2">
              <div class="form-group">
                <label>Kel Brg</label>
                  <input type="text" class="form-control" id="kd_brg" name="kd_brg" value="'.$stcInvent->kel_brg.'" readonly="readonly">        
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Kd Brg</label>
                  <input type="text" class="form-control" id="kd_brg" name="kd_brg" value="'.$stcInvent->kd_brg.'" readonly="readonly">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>Nama Brg</label>                
                  <input type="text" class="form-control" name="part_numb" value="'.$stcInvent->part_numb.'">                
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Ukuran</label>                
                  <input type="text" class="form-control" name="ukuran" value="'.$stcInvent->ukuran.'">                
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                <label>UOM</label>                
                  <input type="text" class="form-control" name="uom" value="'.$stcInvent->uom.'">                
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label>Merk</label>                  
                  '. \Form::select('merk',$list_merk,$stcInvent->merk, $attributes = array('class'=>'form-control select2','id'=>'merk')) .'                 
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Status</label>                
                  <input type="text" class="form-control" name="status" value="'.$stcInvent->status.'">                
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

    public function stInvent_edit(Request $request)
    {
        StInvent::where('id', $request->idM)
                  ->update(['part_numb' => $request->part_numb,
                            'ukuran' => $request->ukuran,
                            'uom' => $request->uom,
                            'merk' => $request->merk,
                            'status' => $request->status
                            ]);
        return redirect()->route('stInvent')->with('success', 'Edit data sukses!');
    }

    public function stInvent_del(Request $request)
    {
        DB::beginTransaction();
        try{
            StInvent::where('id', $request->del_id)->delete();
            DB::commit();
            return back()->with('success',' Data deleted successfully');
        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error',' There is some problem, please try again or call your admin!');
        }
    }

}
