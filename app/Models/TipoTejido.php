<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoTejido extends Model
{
    protected $table='tipos_tejidos';
    
    protected $fillable = [
        'nombre',
        'detalles',
 
    
    ];

    
}
