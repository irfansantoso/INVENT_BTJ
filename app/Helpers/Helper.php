<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Session;

class Helper {

    public static function angkaKeRomawi($number)
    {
        $map = [
            1000 => 'M', 900 => 'CM', 500 => 'D', 400 => 'CD',
            100 => 'C', 90 => 'XC', 50 => 'L', 40 => 'XL',
            10 => 'X', 9 => 'IX', 5 => 'V', 4 => 'IV', 1 => 'I',
        ];

        $result = '';

        foreach ($map as $value => $roman) {
            while ($number >= $value) {
                $result .= $roman;
                $number -= $value;
            }
        }

        return $result;
    }

    public static function rupiah($angka){
    
        $hasil_rupiah = number_format($angka,0,',','.');
        return $hasil_rupiah;
     
    }

    public static function bulan(){
        $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
        return $bulan;
    }

    public static function convertBulan($mm){
            switch ($mm) {
                case 1 : $bulan="Januari";break;
                case 2 : $bulan="Februari";break;
                case 3 : $bulan="Maret";break;
                case 4 : $bulan="April";break;
                case 5 : $bulan="Mei";break;
                case 6 : $bulan="Juni";break;
                case 7 : $bulan="Juli";break;
                case 8 : $bulan="Agustus";break;
                case 9 : $bulan="September"; break;
                case 10 : $bulan="Oktober";break;
                case 11 : $bulan="November";break;
                case 12 : $bulan="Desember";break;
            }
            return $bulan;  
    }

    public static function countKdBrg($kdBrg)
    {

        return DB::table('tr_detail_pem_sp_bbm')->where('kd_brg', $kdBrg)
                                                ->count();
    }

}
