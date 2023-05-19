<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TrHeaderSaldoAwal extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // public $timestamps = false;
    protected $table = 'tr_header_saldo_awal';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no_ref',
        'no_sppb',
        'supplier',
        'kd_area',
        'kode_periode',
        'tgl_sa',
        'user_created'
    ];
}
