<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{
    protected $table='ordenes_compra';
    
    protected $fillable = [
        'numero',
        'cotizacion',
        'forma_pago',
        'estado',
        'fecha_creacion',
        'id_proveedor',
    
    ];

    
}
