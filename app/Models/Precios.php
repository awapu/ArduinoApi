<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precios extends Model
{
    use HasFactory;
    protected $fillable = [
        'b_codigo',
        'referencia',
        'descripcion',
        'color',
        'talla',
        'coleccion',
        'precio_ant',
        'precio_act',
        'talla_usa',
        'talla_eur'
    ];
    
}
