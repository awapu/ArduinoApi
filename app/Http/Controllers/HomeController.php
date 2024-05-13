<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Validaciones;
use App\Models\Entradas;
use Illuminate\Support\Facades\Auth;

                                           


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        return redirect()->route('administrador.index');
       // return view("administrador.index", compact('Validados', 'Entradas'));
        //return redirect('administrador.index', compact('Validados', 'Entradas'));



    }
}
