<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TrHeaderTpn extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // public $timestamps = false;
    protected $table = 'tr_header_tpn_in';
    protected $primaryKey = 'id_header_tpn_in';
    protected $fillable = [
        'no_tpn',
        'tgl_input_tpn',
        'thn_produksi_tpn',
        'lokasi_tpn',
        'kode_periode',
        'user_updated_tpn',
        'user_created_tpn',
    ];
}
