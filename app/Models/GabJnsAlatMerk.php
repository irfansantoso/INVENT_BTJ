<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class GabJnsAlatMerk extends Model
{

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'mstr_jnsalat_merk';
    protected $primaryKey = 'id_jnsAlatMerk';
    protected $fillable = [
        'kode_jnsAlatMerk',
        'keterangan',
    ];
    
    
}
