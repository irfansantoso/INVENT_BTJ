<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TrHeaderRetPemSpBbm extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // public $timestamps = false;
    protected $table = 'tr_header_rp_sp_bbm';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no_ref',
        'no_sppb',
        'kd_area',
        'supplier',
        'kode_periode',
        'tgl_rp_sp_bbm',
        'loc_activity',
        'keterangan',
        'user_created'
    ];
}
