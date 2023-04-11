<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class UserExport_4 implements FromView
{    
    function __construct($nm_lok,$tgl_laporan,$array) {
        $this->tgl_laporan = $tgl_laporan;
        $this->nm_lok = $nm_lok;
        $this->arr1 = $array;
    }
    public function view(): View
    {
        return view('reporting/xls_stokLoc', [
            'tgl_laporan' => $this->tgl_laporan,
            'nm_lok' => $this->nm_lok,
            'arr1' => $this->arr1
        ]);        
    }
}
