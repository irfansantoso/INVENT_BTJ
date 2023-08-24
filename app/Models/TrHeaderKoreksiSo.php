<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TrHeaderKoreksiSo extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // public $timestamps = false;
    protected $table = 'tr_header_koreksi_so_p';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no_ref',
        'no_koreksi',
        'kd_area',
        'kode_periode',
        'tgl_koreksi',
        'keterangan',
        'user_created'
    ];
}
