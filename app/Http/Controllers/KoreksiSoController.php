<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProcessGlobalController;
use App\Http\Controllers\ProcessQtyController;
use App\Models\TrHeaderKoreksiSo;
use App\Models\TrDetailKoreksiSo;
use App\Models\StInvent;
use App\Models\StsPemakaian;
use App\Models\Lokasi;
use App\Models\FixedAsset;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Session;

class KoreksiSoController extends Controller
{
    public static function getKodePeriodeOperasional()
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);
        return $jsonx[0]['kode_periode'];
    }    
    
    public static function getNewNoRef($kd_area)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $getLastNo = DB::table('tr_header_koreksi_so_p')
                        ->select('no_ref')
                        ->where('kode_periode','=',$jsonx[0]['kode_periode'])
                        ->where('kd_area','=',$kd_area)
                        ->orderBy('no_ref','desc')
                        ->get();        

        $jsonz = json_decode($getLastNo, true);
        $newNo1 = $jsonx[0]['kode_periode']."/";
        if($getLastNo->count() > 0) {
            $nourut = substr($jsonz[0]['no_ref'], 10, 4);
            $nourut++;
            $newNo2 = sprintf("%04s", $nourut) ;
            return $newNo1.$newNo2;
        }else{            
            $newNo3 = '0001';
            return $newNo1.$newNo3;
        }        
    }

    public static function getNewNoKoreksi($kd_area)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $getLastNo = DB::table('tr_header_koreksi_so_p')
                        ->select('no_koreksi')
                        ->where('kode_periode','=',$jsonx[0]['kode_periode'])
                        ->where('kd_area','=',$kd_area)
                        ->orderBy('no_koreksi','desc')
                        ->get();        

        $jsonz = json_decode($getLastNo, true);
        $newNo1 = $jsonx[0]['kode_periode']."/";
        if($getLastNo->count() > 0) {
            $nourut = substr($jsonz[0]['no_koreksi'],  11, 4);
            $nourut++;            
            $newNo2 = sprintf("%04s", $nourut);
            return $newNo1.$newNo2;
        }else{
            $newNo3 = '0001';
            return $newNo1.$newNo3;
        }
    }

    public function trHeaderKoreksiSo()
    {
        $koreksiSo =  TrHeaderKoreksiSo::all();
        $supplier = Supplier::all();

        // Buat instance dari controller lain
        $ProcessGlobalController = new ProcessGlobalController();
        $ProcessQtyController = new ProcessQtyController();

        // Panggil fungsi-fungsi yang diperlukan
        $ProcessGlobalController->processGlobal();
        $ProcessQtyController->processQty();

        $data['title'] = 'PENERIMAAN | KOREKSI';
        return view('transaction/penerimaan/trHeaderKoreksiSo', $data, compact('koreksiSo','supplier'));
    }

    public function trHeaderKoreksiSo_data(Request $request)
    {
        // $data = TrHeaderKoreksiSo::query();
        // $data =  TrHeaderKoreksiSo::leftJoin('mstr_supplier as ms', 'ms.kode_supp','=','tr_header_saldo_awal.supplier')
        //                             ->get(['tr_header_saldo_awal.*','ms.nama_supp as ns']);
        $getNPO = DB::table('periode_operasional')
                        ->select('*')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $data = DB::table(DB::raw("(SELECT tr_header_koreksi_so_p.*, mka.nama_area as nmarea FROM tr_header_koreksi_so_p LEFT JOIN mstr_kd_area as mka ON tr_header_koreksi_so_p.kd_area = mka.kode_area WHERE tr_header_koreksi_so_p.kode_periode = ".$jsonx[0]['kode_periode'].") as tis"));                                    

        return Datatables::of($data)
                ->setTotalRecords(100)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    
                    $btn = '<a href="'. url('trDetailKoreksiSo').'/'.$data->id.'" class="edit btn btn-primary btn-sm">Detail</a>';
                    if(Auth::user()->level == "administrator"){
                    $btn .= '<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id.'" data-kode="'.$data->no_koreksi.'" class="btn btn-danger btn-sm delHeadKoreksiSo" title="Delete">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                // ->toJson();
                ->make(true);
    }

    public function trHeaderKoreksiSo_add(Request $request)
    {
        // dd($request->kode_periode);
        // exit();
        $getNPO = DB::table('periode_operasional')
                        ->select('*')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        if($request->tgl_koreksi < $jsonx[0]['awal_tgl'] || $request->tgl_koreksi > $jsonx[0]['akhir_tgl'])
        {
            return back()
                    ->withInput()
                    ->with('error','Tanggal tidak sesuai dengan tahun periode!');
        }

        $request->validate([
            'no_ref' => 'required|unique:tr_header_koreksi_so_p',
            'no_koreksi' => 'required',
        ]);

        $trHeaderKoreksiSo = new TrHeaderKoreksiSo([
            'no_ref' => $request->no_ref,
            'no_koreksi' => $request->no_koreksi,
            'kd_area' => $request->kd_area,
            'kode_periode' => $request->kode_periode,
            'tgl_koreksi' => $request->tgl_koreksi,
            'keterangan' => $request->keterangan,
            'user_created' => Auth::user()->name
        ]);
        $trHeaderKoreksiSo->save();
        return redirect()->route('trHeaderKoreksiSo')->with('success', 'Tambah data sukses!');
    }

    public function trHeaderKoreksiSoDestroy_del(Request $request)
    {

        $getDetKoreksiSo = TrDetailKoreksiSo::where('id_head_koreksi_so','=',$request->del_id)->get();
        if (!$getDetKoreksiSo->isEmpty()) 
        { 
            return back()->with('error',' Failed, Hapus data detailnya terlebih dahulu!');
        }else{
            TrHeaderKoreksiSo::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');
        }
    }

    public function trDetailKoreksiSo($id_head_koreksi_so)
    {
        // $getHeaderKoreksiSo = TrHeaderKoreksiSo::find($id_head_koreksi_so);
        $getHeaderKoreksiSo = TrHeaderKoreksiSo::leftJoin('mstr_kd_area as mkd', 'mkd.kode_area','=','tr_header_koreksi_so_p.kd_area')
                                    ->where('tr_header_koreksi_so_p.id','=',$id_head_koreksi_so)
                                    ->first(['tr_header_koreksi_so_p.*','mkd.nama_area as nmarea']);

        $stInvent = StInvent::all();
        $getDetailKoreksiSo = TrDetailKoreksiSo::leftJoin('tr_invent_stock as tris', 'tris.kd_brg','=','tr_detail_koreksi_so_p.kd_brg')
                                    ->where('tr_detail_koreksi_so_p.id_head_koreksi_so','=',$id_head_koreksi_so)
                                    ->get(['tr_detail_koreksi_so_p.*','tris.kd_brg as kdbrg','tris.part_numb as partnumb','tris.merk as merk','tris.ukuran as ukuran']);
 
        $data['title'] = 'Detail Koreksi';
        return view('transaction/penerimaan/trDetailKoreksiSo', $data, compact('getHeaderKoreksiSo','stInvent','getDetailKoreksiSo'));
        
    }

    public function trDetailKoreksiSo_add(Request $request)
    {

        $request->validate([
            'kd_brg' => 'required',
        ]);

        $trDetailKoreksiSo = new trDetailKoreksiSo([
            'id_head_koreksi_so' => $request->id_head_koreksi_so,
            'kd_brg' => $request->kd_brg,
            'part_numb' => $request->part_numb,
            'qty' => $request->qty,
            'uom' => $request->uom,
            'hrg_satuan' => $request->hrg_satuan,
            'total' => $request->total,
            'hrg_beli' => $request->hrg_beli,
            'kode_periode' => $request->kode_periode,
            'tgl_det_koreksi_so' => $request->tgl_det_koreksi_so,
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
            $trDetailKoreksiSo->save();
            // Buat instance dari controller lain
            $ProcessGlobalController = new ProcessGlobalController();
            $ProcessQtyController = new ProcessQtyController();

            // Panggil fungsi-fungsi yang diperlukan
            $ProcessGlobalController->processGlobal();
            $ProcessQtyController->processQty();
            return redirect()->route('trDetailKoreksiSo',[$request->id_head_koreksi_so])->with('success', 'Tambah data sukses!');
        }
    }

    public function trDetailKoreksiSo_edit(Request $request)
    {

        trDetailKoreksiSo::where('id', $request->id)
                  ->update([
                            'kd_brg' => $request->kd_brg,
                            'part_numb' => $request->part_numb,
                            'qty' => $request->qty,
                            'uom' => $request->uom,
                            'hrg_satuan' => $request->hrg_satuan,
                            'total' => $request->total,
                            'hrg_beli' => $request->hrg_beli,
                            'kode_periode' => $request->kode_periode,
                            'tgl_det_koreksi_so' => $request->tgl_det_koreksi_so,
                            'keterangan' => $request->keterangan,
                            'user_created' => Auth::user()->name,
                            'updated_at' => date('Y-m-d H:i:s'),
                            ]);
        // return redirect()->route('trDetailKoreksiSo',[$request->id_head_koreksi_so])->with('success', 'Ubah data sukses!');
                  
        // Buat instance dari controller lain
        $ProcessGlobalController = new ProcessGlobalController();
        $ProcessQtyController = new ProcessQtyController();

        // Panggil fungsi-fungsi yang diperlukan
        $ProcessGlobalController->processGlobal();
        $ProcessQtyController->processQty();
        return back()->with('success',' Ubah data successfully');

    }

    public function trDetailKoreksiSo_del(Request $request)
    {
        $getDetKoreksiSo =  TrDetailKoreksiSo::where('id','=',$request->del_id)->get();
        if ($getDetKoreksiSo->isEmpty()) 
        { 
            return back()->with('error',' Failed, data tidak ada!');
        }else{
            TrDetailKoreksiSo::find($request->del_id)->delete();
            // Buat instance dari controller lain
            $ProcessGlobalController = new ProcessGlobalController();
            $ProcessQtyController = new ProcessQtyController();

            // Panggil fungsi-fungsi yang diperlukan
            $ProcessGlobalController->processGlobal();
            $ProcessQtyController->processQty();
            return back()->with('success',' Data deleted successfully');
        }

    }

    public function stInvKoreksiSo_data(Request $request)
    {
        // $data = StInvent::query();
      $data = DB::table(DB::raw("(SELECT tr_invent_stock.*,CAST(temp_qty.qty AS DECIMAL(10,2)) as qty,CAST(temp_qty.nilai AS DECIMAL(14,2)) as nilai, mstr_jnsalat_merk.keterangan as ket, tr_detail_saldo_awal.harga_satuan as hrg_sat FROM tr_invent_stock LEFT JOIN temp_qty ON tr_invent_stock.kd_brg = temp_qty.kd_brg
          LEFT JOIN mstr_jnsalat_merk ON tr_invent_stock.kel_brg = mstr_jnsalat_merk.kode_jnsAlatMerk LEFT JOIN tr_detail_saldo_awal ON tr_invent_stock.kd_brg = tr_detail_saldo_awal.kd_brg) as tis"));
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
                                        data-qty="'.$data->qty.'"
                                        data-nilai="'.$data->nilai.'"
                                        data-hrg_sat="'.$data->hrg_sat.'"
                                class="btn btn-primary btn-sm clickInv" title="pilih">PILIH</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                // ->toJson();
                ->make(true);
    }

    public function stInvKoreksiSo_data_x(Request $request)
    {
        // $data = StInvent::query();
      $data = DB::table(DB::raw("(SELECT tr_invent_stock.*,temp_qty.qty as qty, mstr_jnsalat_merk.keterangan as ket, tr_detail_saldo_awal.harga_satuan as hrg_sat FROM tr_invent_stock LEFT JOIN temp_qty ON tr_invent_stock.kd_brg = temp_qty.kd_brg
          LEFT JOIN mstr_jnsalat_merk ON tr_invent_stock.kel_brg = mstr_jnsalat_merk.kode_jnsAlatMerk LEFT JOIN tr_detail_saldo_awal ON tr_invent_stock.kd_brg = tr_detail_saldo_awal.kd_brg) as tis"));
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
                                        data-hrg_sat="'.$data->hrg_sat.'"
                                class="btn btn-primary btn-sm clickInv_x" title="pilih">PILIH</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                // ->toJson();
                ->make(true);
    }    

    // public function stInvent_edit(Request $request)
    // {
    //     StInvent::where('id', $request->idM)
    //               ->update(['part_numb' => $request->part_numb,
    //                         'ukuran' => $request->ukuran,
    //                         'uom' => $request->uom,
    //                         'merk' => $request->merk,
    //                         'status' => $request->status
    //                         ]);
    //     return redirect()->route('stInvent')->with('success', 'Edit data sukses!');
    // }

    // public function stInvent_del(Request $request)
    // {
    //     DB::beginTransaction();
    //     try{
    //         StInvent::where('id', $request->del_id)->delete();
    //         DB::commit();
    //         return back()->with('success',' Data deleted successfully');
    //     }catch(\Exception $e){
    //         DB::rollback();
    //         return back()->with('error',' There is some problem, please try again or call your admin!');
    //     }
    // }

}
