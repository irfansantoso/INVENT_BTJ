<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AktivitasAlat extends Model
{

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'mstr_aktivitas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_akv',
        'nama_akv',
        'cat_akv',
    ];
    
    
}
