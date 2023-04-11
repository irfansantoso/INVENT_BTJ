<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class JnsAlat extends Model
{

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'mstr_jns_alat';
    protected $primaryKey = 'id_jnsAlat';
    protected $fillable = [
        'kode_jnsAlat',
        'nama_jnsAlat',
    ];
    
    
}
