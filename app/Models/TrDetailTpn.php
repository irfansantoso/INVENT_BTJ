<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TrDetailTpn extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $timestamps = false;
    protected $table = 'tr_detail_tpn_in';
    protected $primaryKey = 'id_detail_tpn_in';
    protected $fillable = [
        'id_header_tpn_in',
        'no_tpn',
        'hph',
        'tgl_input_tpn',
        'thn_produksi_tpn',
        'lokasi_tpn',
        'thn_rkt',
        'no_btg',
        'tgl_ukur',
        'jns_kayu',
        'kode_chainsaw',
        'kode_driver',
        'kode_kupas',
        'pjg',
        'pkl',
        'ujg',
        'rt2',
        'vol',
        'cct',
        'pcct',
        'petak',
        'kelas',
        'timbul',
        'position',
        'user_updated_tpn',
        'user_created_tpn',
        'updateAt',
        'createdAt',
    ];
}
