<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class UserExport_2 implements FromView
{    
    function __construct($hph,$tgl_laporan,$thn_produksi,$array,$array2,$array3,$array4) {
        $this->hph = $hph;
        $this->tgl_laporan = $tgl_laporan;
        $this->thn_produksi = $thn_produksi;
        $this->arr1 = $array;
        $this->arr2 = $array2;
        $this->arr3 = $array3;
        $this->arr4 = $array4;
    }
    public function view(): View
    {
        //export adalah file export.blade.php yang ada di folder views
        // $pieces = explode("-", $this->tgl_laporan);
        // $startDt = $pieces[0];
        // $endDt = $pieces[1];
        // $strDt = date("Y-m-d", strtotime($startDt));
        // $eDt = date("Y-m-d", strtotime($endDt));

        if($this->hph == "BCT"){
            return view('reporting/xls_hasilCsTr', [
                'hph' => $this->hph,
                'tgl_laporan' => $this->tgl_laporan,
                'thn_produksi' => $this->thn_produksi,
                'arr1' => $this->arr1,
                'arr2' => $this->arr2,
                'arr3' => $this->arr3,
                'arr4' => $this->arr4
            ]);
        }
    }
}
