<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TrDetailPinGudSpBbm extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // public $timestamps = false;
    protected $table = 'tr_detail_pg_sp_bbm';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_head_p_spbbm',
        'kd_brg',
        'tgl_det_p_spbbm',
        'part_numb',
        'kd_fa',
        'qty',
        'total',
        'hrg_beli',
        'uom',
        'kd_sts',
        'kode_periode',        
        'keterangan',        
        'user_created'
    ];
}
