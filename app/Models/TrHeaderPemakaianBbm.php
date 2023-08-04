<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TrHeaderPemakaianBbm extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // public $timestamps = false;
    protected $table = 'tr_header_pemakaian_bbm';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no_ref',
        'no_bpm',
        'kd_area',
        'tgl_p_bbm',
        'loc_activity',
        'user_created'
    ];
}
