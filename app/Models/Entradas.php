<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entradas extends Model
{
    protected $fillable = ['id', 'Evento', 'nBoleta', 'Localidad'];

}
