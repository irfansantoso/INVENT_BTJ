<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class UserExport_3 implements FromView
{    
    function __construct($nm_lok,$array) {
        $this->nm_lok = $nm_lok;
        $this->arr1 = $array;
    }
    public function view(): View
    {
        return view('reporting/xls_loglist', [
            'nm_lok' => $this->nm_lok,
            'arr1' => $this->arr1
        ]);        
    }
}
