<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenCompraProducto extends Model
{
    protected $table='ordenes_compra_productos';
    
    protected $fillable = [
        'id_orden',
        'id_producto',
        'cantidad',
  
    
    ];

    
}
