<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TrDetailSaldoAwal extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // public $timestamps = false;
    protected $table = 'tr_detail_saldo_awal';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_head_sa',
        'kd_brg',
        'part_numb',
        'qty',
        'uom',
        'harga_satuan',
        'total',
        'tgl_det_sa',        
        'user_created'
    ];
}
