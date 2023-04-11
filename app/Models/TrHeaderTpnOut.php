<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TrHeaderTpnOut extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $timestamps = false;
    protected $table = 'tr_header_tpn_out';
    protected $primaryKey = 'id_header_tpn_out';
    protected $fillable = [
        'no_tpn_out',
        'no_loglist',
        'tgl_input_tpn_out',
        'trip',
        'lokasi_tpn',
        'tujuan',
        'optMuat',
        'muatUnit',
        'optBongkar',
        'bongkarUnit',
        'optAngkut',
        'angkutUnit',
        'kode_periode',        
        'user_updated',
        'user_created',
        'updated_at',
        'created_at',
    ];
}
