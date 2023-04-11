<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TrDetailPosition extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $timestamps = false;
    protected $table = 'tr_detail_position';
    protected $primaryKey = 'id_detail_position';
    protected $fillable = [
        'id_header',
        'id_detail_tpn_in',
        'no_tpn_tpk',
        'no_loglist',
        'hph',
        'tgl_input',
        'from_lokasi',
        'to_lokasi',
        'no_btg',
        'position',     
        'user_updated',
        'user_created',
        'updateAt',
        'createdAt',
    ];
}
