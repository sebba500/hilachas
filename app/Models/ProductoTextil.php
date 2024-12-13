<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoTextil extends Model
{
    protected $table='productos_textiles';
    
    protected $fillable = [
        'tipo',
        'detalles',
 
    
    ];

    
}
