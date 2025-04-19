<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarioPrendas extends Model
{
    protected $table = 'inventario_prendas';

    protected $fillable = [
        'id_producto_textil',
        'id_tipo_tejido',
        'id_material_textil',
        'origen',
        'color',
        'color_codigo',
        'procesada',

    ];
}
