<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TrHeaderPb extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // public $timestamps = false;
    protected $table = 'tr_header_pb';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no_pb',
        'kd_area',
        'kd_unit',
        'status_pb',
        'kepada',
        'camp_manager',
        'kepala_gudang',
        'kepala_mekanik',
        'mekanik',
        'kode_periode',
        'tgl_pb',
        'user_created'
    ];
}
