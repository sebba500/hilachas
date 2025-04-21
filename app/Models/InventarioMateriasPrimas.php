<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarioMateriasPrimas extends Model
{
    protected $table = 'inventario_materias_primas';

    protected $fillable = [
        'id_material_textil',
        'color',
        'color_codigo',
        'estampado',
        'peso',
  

    ];
}
