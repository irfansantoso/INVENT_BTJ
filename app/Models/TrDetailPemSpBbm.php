<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TrDetailPemSpBbm extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // public $timestamps = false;
    protected $table = 'tr_detail_pem_sp_bbm';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_head_p_spbbm',
        'kd_brg',
        'part_numb',
        'qty',
        'uom',
        'harga_satuan',
        'total',
        'kd_fa',
        'kd_sts',
        'kode_periode',
        'tgl_det_p_spbbm',
        'keterangan',        
        'user_created'
    ];
}
