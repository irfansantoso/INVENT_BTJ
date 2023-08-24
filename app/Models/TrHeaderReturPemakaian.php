<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TrHeaderReturPemakaian extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // public $timestamps = false;
    protected $table = 'tr_header_retur_pemakaian';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no_ref',
        'retur_p',
        'kd_area',
        'kode_periode',
        'tgl_retur',
        'keterangan',
        'user_created'
    ];
}
