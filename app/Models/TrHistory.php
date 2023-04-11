<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TrHistory extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $timestamps = false;
    protected $table = 'tr_history';
    protected $primaryKey = 'id_history';
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
        'vol',
        'petak',
        'kelas',
        'timbul',
        'position',
        'createdAt',
    ];
}
