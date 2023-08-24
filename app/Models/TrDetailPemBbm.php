<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TrDetailPemBbm extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // public $timestamps = false;
    protected $table = 'tr_detail_pem_bbm';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_head_p_bbm',
        'kd_brg',
        'jns_alat',
        'jumlah',
        'uom',
        'hrg_beli',        
        'kd_fa',
        'sts_pakai',
        'tgl_det_p_bbm',
        'hmkm_awal',
        'hmkm_akhir',
        'krj_alat',
        'rata_rata',
        'kode_lokasi',
        'kode_akv',
        'keterangan',
        'kode_periode',
        'user_created'
    ];
}
