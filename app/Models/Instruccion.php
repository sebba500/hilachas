<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruccion extends Model
{
    protected $table = 'instrucciones';

    protected $fillable = [
        'id_tipo_tejido',
        'id_material_textil',
        'instrucciones',

    ];
}
