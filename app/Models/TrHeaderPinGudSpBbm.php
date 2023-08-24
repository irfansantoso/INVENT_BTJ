<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TrHeaderPinGudSpBbm extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // public $timestamps = false;
    protected $table = 'tr_header_pg_sp_bbm';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no_ref',
        'no_sppb',
        'supplier',
        'from_kd_area',
        'to_kd_area',
        'kode_periode',
        'tgl_pg_sp_bbm',
        'loc_activity',
        'keterangan',
        'user_created'
    ];
}
