<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class UserExport_5 implements FromView
{    
    function __construct($nm_tkg,$tgl_laporan,$array) {
        $this->tgl_laporan = $tgl_laporan;
        $this->nm_tkg = $nm_tkg;
        $this->arr1 = $array;
    }
    public function view(): View
    {
        return view('reporting/xls_rekapTkg', [
            'tgl_laporan' => $this->tgl_laporan,
            'nm_tkg' => $this->nm_tkg,
            'arr1' => $this->arr1
        ]);        
    }
}
