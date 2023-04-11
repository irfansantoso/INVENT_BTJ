<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class UserExport_7 implements FromView
{    
    function __construct($tgl_laporan,$array) {
        $this->tgl_laporan = $tgl_laporan;
        $this->arr1 = $array;
    }
    public function view(): View
    {
        return view('reporting/xls_rptStokAkhGab', [
            'tgl_laporan' => $this->tgl_laporan,
            'arr1' => $this->arr1
        ]);        
    }
}
