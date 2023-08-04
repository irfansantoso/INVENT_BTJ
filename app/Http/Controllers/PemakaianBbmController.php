<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TrHeaderPemakaianBbm;
use App\Models\TrDetailPemSpBbm;
use App\Models\StInvent;
use App\Models\StsPemakaian;
use App\Models\Lokasi;
use App\Models\FixedAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Session;

class PemakaianBbmController extends Controller
{
    public static function getNewNoRef($kd_area)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $getLastNo = DB::table('tr_header_pemakaian_bbm')
                        ->select('no_ref')
                        // ->where('kode_periode','=',$jsonx[0]['kode_periode'])
                        ->where('kd_area','=',$kd_area)
                        ->orderBy('no_ref','desc')
                        ->get();        

        $jsonz = json_decode($getLastNo, true);
        $newNo1 = $jsonx[0]['kode_periode'];
        if($getLastNo->count() > 0) {
            $nourut = substr($jsonz[0]['no_ref'], 11, 4);
            $nourut++;
            $newNo2 = sprintf("%04s", $nourut) ;
            return $newNo1.$newNo2;
        }else{            
            $newNo3 = '0001';
            return $newNo1.$newNo3;
        }
    }    

    public function trHeaderPemakaianBbm()
    {
        $headerPemakaianBbm =  TrHeaderPemakaianBbm::all();
        $lokasi = Lokasi::all();

        $data['title'] = 'Header Pemakaian BBM';
        return view('transaction/pengeluaran_bbm/trHeaderPemakaianBbm', $data, compact('headerPemakaianBbm','lokasi'));
    }

    public function trHeaderPemakaianBbm_data(Request $request)
    {
        // $data = TrHeaderPemakaianBbm::query();
        // $data =  TrHeaderPemakaianBbm::leftJoin('mstr_supplier as ms', 'ms.kode_supp','=','tr_header_saldo_awal.supplier')
        //                             ->get(['tr_header_saldo_awal.*','ms.nama_supp as ns']);

        $data = DB::table(DB::raw("(SELECT tr_header_pemakaian_bbm.*,mstr_lokasi.nama_lokasi as nmlok FROM tr_header_pemakaian_bbm LEFT JOIN mstr_lokasi ON tr_header_pemakaian_bbm.loc_activity = mstr_lokasi.kode_lokasi) as tis"));                                    

        return Datatables::of($data)
                ->setTotalRecords(100)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    
                    $btn = '<a href="'. url('trDetailPemSpBbm').'/'.$data->id.'" class="edit btn btn-primary btn-sm">Detail</a>';
                    if(Auth::user()->level == "administrator"){
                    $btn .= '<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id.'" data-kode="'.$data->no_bpm.'" class="btn btn-danger btn-sm delStInvent" title="Delete">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                // ->toJson();
                ->make(true);
    }

    public function trHeaderPemakaianBbm_add(Request $request)
    {
        // dd($request->kode_periode);
        // exit();
        $request->validate([
            'no_ref' => 'required|unique:tr_header_pemakaian_bbm',
            'no_bpm' => 'required',
        ]);

        $trHeaderPemakaianBbm = new TrHeaderPemakaianBbm([
            'no_ref' => $request->no_ref,
            'no_bpm' => $request->no_bpm,
            'kd_area' => $request->kd_area,
            'kode_periode' => $request->kode_periode,
            'tgl_p_sp_bbm' => $request->tgl_p_sp_bbm,
            'loc_activity' => $request->loc_activity,
            'user_created' => Auth::user()->name
        ]);
        $trHeaderPemakaianBbm->save();
        return redirect()->route('trHeaderPemakaianBbm')->with('success', 'Tambah data sukses!');
    }

    public function trDetailPemSpBbm($id_head_p_spbbm)
    {
        $getHeaderPsb = TrHeaderPemakaianBbm::find($id_head_p_spbbm); 
        $fixedAsset = FixedAsset::all();
        $stsPemakaian = StsPemakaian::all();    
        $stInvent = StInvent::all();
        $getDetailPsb = TrDetailPemSpBbm::leftJoin('tr_invent_stock as tris', 'tris.kd_brg','=','tr_detail_pem_sp_bbm.kd_brg')                                    
                                    ->where('tr_detail_pem_sp_bbm.id','=',$id_head_p_spbbm)
                                    ->get(['tr_detail_pem_sp_bbm.*','tris.kd_brg as kdbrg','tris.ukuran as ukuran']);
 
        $data['title'] = 'Detail Pemakaian Sparepart & BBM';
        return view('transaction/pengeluaran_spbbm/trDetailPemSpBbm', $data, compact('getHeaderPsb','fixedAsset','stsPemakaian','stInvent','getDetailPsb'));
        
    }

    public function trDetailPemSpBbm_add(Request $request)
    {
        $request->validate([
            'kd_brg' => 'required',
        ]);

        $year = date('Y', strtotime($request->tgl_det_p_spbbm));
        $month = date("m", strtotime($request->tgl_det_p_spbbm));

        $trDetailPemSpBbm = new trDetailPemSpBbm([
            'id_head_p_spbbm' => $request->id_head_p_spbbm,
            'kd_brg' => $request->kd_brg,
            'gudang' => $request->kd_area,            
            'tgl_det_p_spbbm' => $request->tgl_det_p_spbbm,
            'year' => $year,
            'month' => $month,
            'kd_fa' => $request->kd_fa,
            'qty' => $request->qty,
            'harga_satuan' => $request->harga_satuan,
            'total' => $request->total,
            'hrg_beli' => $request->hrg_beli,
            'nm_brg' => $request->nm_brg,
            'uom' => $request->uom,
            'kd_sts' => $request->kd_sts,
            'kode_periode' => $request->kode_periode,
            'keterangan' => $request->keterangan,
            'user_created' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);        

        if (Auth::user()->username == null or Auth::user()->username == "") {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            $trDetailPemSpBbm->save();
            return redirect()->route('trDetailPemSpBbm',[$request->id_head_p_spbbm])->with('success', 'Tambah data sukses!');
        }
    }    

    public function stInvSpBbm_data(Request $request)
    {
        // $data = StInvent::query();
      $data = DB::table(DB::raw("(SELECT tr_invent_stock.*,temp_qty.qty as qty, mstr_jnsalat_merk.keterangan as ket FROM tr_invent_stock LEFT JOIN temp_qty ON tr_invent_stock.kd_brg = temp_qty.kd_brg
          LEFT JOIN mstr_jnsalat_merk ON tr_invent_stock.kel_brg = mstr_jnsalat_merk.kode_jnsAlatMerk) as tis"));
      // $data = StInvent::leftJoin('temp_qty as tq', 'tq.kd_brg','=','tr_invent_stock.kd_brg')
      //                               ->get(['tr_invent_stock.*','tq.qty as qty']);

        return Datatables::of($data)
                ->setTotalRecords(100)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    
                    $btn = '<a href="#" data-id="'.$data->id.'" 
                                        data-kdbrg="'.$data->kd_brg.'"
                                        data-kelbrg="'.$data->kel_brg.'"
                                        data-partnumb="'.$data->part_numb.'"
                                        data-uk="'.$data->ukuran.'"
                                        data-uom="'.$data->uom.'"
                                        data-merk="'.$data->merk.'"
                                        data-ket="'.$data->ket.'"
                                class="btn btn-primary btn-sm clickInv" title="pilih">PILIH</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                // ->toJson();
                ->make(true);
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
