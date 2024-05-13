<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Validaciones;
use App\Models\Entradas;
use App\Models\Invalidas;


use Illuminate\Support\Facades\Http;
use App\Events\NewDataInserted;

class ApiValidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

     
     public function Codigo($id)
{
    // Realizar la consulta para obtener la entrada
    $entrada = Entradas::where('nBoleta', '=', $id)->first();

    // Verificar si se encontró la entrada
    if (!$entrada) {

        // Crear un nuevo objeto Validaciones
        $validacion = new Invalidas();
        // Asignar valores de la entrada a los campos correspondientes en la validación
        $validacion->Nboleta = $id;

        $validacion->save();

        return response()->json([
            'success' => false,
            'message' => 'No se encontró la entrada.'
        ]);
    } else {
        try {
            // Verificar si la boleta ya fue leída
            if ($entrada->check) {


                return response()->json([
                    'success' => false,
                    'message' => 'La boleta ya fue leída.'
                ]);
            }

            // Actualizar el campo "check" a true
            $entrada->check = true;
            $entrada->save();

            // Crear un nuevo objeto Validaciones
            $validacion = new Validaciones();

            // Asignar valores de la entrada a los campos correspondientes en la validación
            $validacion->Evento = $entrada->Evento;
            $validacion->Localidad = $entrada->Localidad;
            $validacion->nBoleta = $entrada->nBoleta;
            // Asigna otros campos según sea necesario

            // Guardar el objeto en la base de datos
            $validacion->save();

            return response()->json([
                'success' => true,
                'message' => 'La entrada se validó correctamente.',
                'Boleta' => $entrada
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al insertar la validación: ' . $e->getMessage()
            ]);
        }
    }
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
