<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TrDetailReturPemakaian extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // public $timestamps = false;
    protected $table = 'tr_detail_retur_pemakaian';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_head_retur_pemakaian',
        'kd_brg',
        'part_numb',
        'qty',
        'uom',
        'hrg_satuan',
        'total',
        'hrg_beli',
        'kode_periode',
        'tgl_det_retur_pemakaian',
        'keterangan',        
        'user_created'
    ];
}
