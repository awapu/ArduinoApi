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

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

            // Recuperar todos los registros de la tabla Entradas
            $entradas = Entradas::all();

            $falsos = Invalidas::all();


            // Pasar las variables a la vista
            return view('administrador.home', [
                'totalEntradas' => $totalEntradas,
                'entradasLeidas' => $entradasLeidas,
                'porcentajeLeidas' => $porcentajeLeidas,
                'porcentajeNoLeidas' => $porcentajeNoLeidas,
                'Validados' => $validados, // Aquí cambia a 'Validados' en lugar de 'validados'
                'Entradas' => $entradas,     // Aquí cambia a 'Entradas' en lugar de 'entradas'
                'Falsos' => $falsos,     // boletas falsas
            ]);

            

    }


    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
