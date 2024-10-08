<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class GabJnsAlatMerk2 extends Model
{

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'mstr_jnsalat_merk_2';
    protected $primaryKey = 'id_jnsAlatMerk';
    protected $fillable = [
        'kode_jnsAlatMerk',
        'keterangan',
    ];
    
    
}
