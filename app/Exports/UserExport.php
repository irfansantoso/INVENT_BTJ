<?php

namespace App\Exports;

use App\Models\TrHeaderTpn;
use App\Models\TrDetailTpn;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class UserExport implements FromView
{    
    function __construct($hph,$tgl_laporan,$thn_produksi,$array) {
        $this->hph = $hph;
        $this->tgl_laporan = $tgl_laporan;
        $this->thn_produksi = $thn_produksi;
        $this->arr1 = $array;
    }
    public function view(): View
    {
        //export adalah file export.blade.php yang ada di folder views
        if($this->hph == "BCT"){
            return view('reporting/xls_stokKayu', [
                'hph' => $this->hph,
                'tgl_laporan' => $this->tgl_laporan,
                'thn_produksi' => $this->thn_produksi,
                'arr1' => $this->arr1
            ]);
        }
    }
}
