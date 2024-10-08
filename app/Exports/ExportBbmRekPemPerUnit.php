<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ExportBbmRekPemPerUnit implements FromView, WithEvents
{   
    use RegistersEventListeners;
    function __construct($bln,$thn,$array) {
        $this->bln = $bln;
        $this->thn = $thn;
        $this->getSumNilai = $array;
    }
    public function view(): View
    {
        //export adalah file export.blade.php yang ada di folder views
        return view('reporting/xls_bbmRekPemPerUnit', [
            'bln' => $this->bln,
            'thn' => $this->thn,
            'getSumNilai' => $this->getSumNilai
        ]);
    }
    public static function afterSheet(AfterSheet $event)
    {
        // Create Style Arrays
        $default_font_style = [
            'font' => ['name' => 'Calibri', 'size' => 8]
        ];


        // Get Worksheet
        $active_sheet = $event->sheet->getDelegate();

        // $active_sheet->getStyle('A1:F1')->applyFromArray($default_font_style);

    }
}
