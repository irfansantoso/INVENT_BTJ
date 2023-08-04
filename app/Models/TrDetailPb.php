<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TrDetailPb extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // public $timestamps = false;
    protected $table = 'tr_detail_pb';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_head_pb',
        'kd_brg',
        'part_numb',
        'merk',
        'qty',
        'uom',
        'kode_periode',
        'tgl_det_pb',
        'user_created'
    ];
}
