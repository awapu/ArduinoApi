<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

//agreagados
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;

//use Spatie\Permissions\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use App\Models\Validaciones;
use App\Models\Entradas;
use App\Models\Invalidas;

class ActualizarController extends Controller
{
    public function actualizarSeccion()
    {

    // Contar el total de registros en la tabla "entradas"
    $totalEntradas = Entradas::count();

    // Contar cuántas entradas están marcadas como leídas
    $entradasLeidas = Entradas::where('check', true)->count();

    // Calcular el porcentaje de boletas leídas y no leídas
    $porcentajeLeidas = ($entradasLeidas / $totalEntradas) * 100;
    $porcentajeNoLeidas = 100 - $porcentajeLeidas;

    // Recuperar todos los registros de la tabla Validaciones
    $validados = Validaciones::all();

    // Recuperar todos los registros de la tabla Invalidas
    $falsos = Invalidas::all();

    // Pasar solo los datos necesarios a la vista
    return response()->json([
        'totalEntradas' => $totalEntradas,
        'entradasLeidas' => $entradasLeidas,
        'porcentajeLeidas' => $porcentajeLeidas,
        'porcentajeNoLeidas' => $porcentajeNoLeidas,
        'Validados' => $validados,
        'Falsos' => $falsos,
    ]);


    }
}
