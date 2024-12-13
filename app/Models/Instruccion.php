<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialTextil extends Model
{
    protected $table='materiales_textiles';
    
    protected $fillable = [
        'nombre',
        'detalles',
 
    
    ];

    
}
