<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class StInvent extends Model
{

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'tr_invent_stock';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kd_brg',
        'kel_brg',
        'part_numb',
        'ukuran',
        'uom',
        'merk',
        'status'        
    ];
    
    
}
