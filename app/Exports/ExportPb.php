<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class ExportPb implements FromView
{    
    function __construct($id) {
        $this->id = $id;
    }
    public function view(): View
    {
        
        return view('reporting/rpt_printPb', [
            'id' => $this->id
        ]);
    }
}
