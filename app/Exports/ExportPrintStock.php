<?php

namespace App\Exports;

// use App\Models\TrHeaderTpn;
// use App\Models\TrDetailTpn;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ExportPrintStock implements FromView, WithEvents
{   
    use RegistersEventListeners;
    function __construct($array) {
        $this->dataStock = $array;
    }
    public function view(): View
    {
        //export adalah file export.blade.php yang ada di folder views
        return view('reporting/rpt_printStock', [
            'dataStock' => $this->dataStock
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
