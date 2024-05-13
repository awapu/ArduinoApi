<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//agreagados
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;

//use Spatie\Permissions\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class ChangePasswordController extends Controller
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

        $request->validate([
            'password_current' => ['required','string','min:5'],
            'password' => ['required', 'string', 'min:5', 'confirmed']
        ],[

            'password.required' => 'Valide Contraseña',
            'password.confirmed' => 'Debe confirmar contraseña',
            'password_current.required' => 'Contraseña actual requerida',

        ]);

        $currentPasswordStatus = Hash::check($request->password_current, auth()->user()->password);

        if($currentPasswordStatus){

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('message','Contraseña Actualizada');
            

        }else{

            return redirect()->back()->with('message','Contraseña actual no coincide con la anterior');
        }
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
