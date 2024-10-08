<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ProcessGlobal extends Model
{

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'temp_reporting';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kd_brg',
        'kel_brg',
        'nm_brg',
        'ukuran',
        'satuan',
        'qty',
        'nilai',
        'kode_periode',
        'from_table'
    ];
    
    
}
