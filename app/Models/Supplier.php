<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Supplier extends Model
{

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'mstr_supplier';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_supp',
        'nama_supp',
        'alamat_supp',
        'kota_supp',
        'pic_supp'
    ];
    
    
}
