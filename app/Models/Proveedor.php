<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table='proveedores';
    
    protected $fillable = [
        'nombre',   
        'rut',  
        'email',  
        'direccion',  
        'telefono',  
        'contacto',
    ];
}
