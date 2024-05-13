<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Establecimientos;
use Illuminate\Support\Facades\File;

class EstablecimientoController extends Controller
{

    function __construct()
    {
        //se agregan los permsisos que se han definido
        $this->middleware('permission:ver-establecimientos|crear-establecimientos|editar-establecimientos|borrar-establecimientos', ['only'=>['index']]);
        //especificamos para que es cada rol
        $this->middleware('permission:crear-establecimientos', ['only'=>['create', 'store']]);
        $this->middleware('permission:editar-establecimientos', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-establecimientos', ['only'=>['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Establecimientos::paginate(20);

        return view('establecimientos.index', compact('empresas'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('establecimientos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        request()->validate([
            'nombre_emp' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
        ],[
            'nombre_emp.required' => 'Valide Nombre',
            'direccion.required' => 'Valide Direccion',
            'telefono.required' => 'Valide Telefono'
        ]);

        $datosEstablecimientos = $request->all(); 

        if($request->has('imagen')){
            $file = $request->file('imagen');
            $image = $request->file('imagen');
            $name = $request->get('imagen')."awapu".uniqid() .$file->getClientOriginalName();
            $file->move(public_path().'/img/establecimientos', $name);
            
            $datosEstablecimientos ['imagen']=$name;
        }

        Establecimientos::create($datosEstablecimientos);

        return redirect()->route('establecimientos.index');

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
    public function edit(Establecimientos $establecimiento)
    {

        //$establecimientos = Establecimientos::find($establecimiento);
        
          // return response()->json($establecimientos);
        return view('establecimientos.editar', compact('establecimiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Establecimientos $establecimiento)
    {
        request()->validate([
            'nombre_emp' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
        ],[
            'nombre_emp.required' => 'Valide Nombre',
            'direccion.required' => 'Valide Direccion',
            'telefono.required' => 'Valide Telefono'
        ]);

        $fileapk = $establecimiento->imagen;
        File::delete(public_path().'/img/establecimientos/'.$fileapk);
        
        $datosEstablecimientos = $request->all(); 

        if($request->has('imagen')){
            $file = $request->file('imagen');
            $image = $request->file('imagen');
            $name = $request->get('imagen')."awapu".uniqid() .$file->getClientOriginalName();
            $file->move(public_path().'/img/establecimientos', $name);
            
            $datosEstablecimientos ['imagen']=$name;
        }


        $establecimiento->update($datosEstablecimientos);
        //Establecimientos::where('id', $id)->update($request->all());
        //Establecimientos::query()->update($request->all());

        return redirect()->route('establecimientos.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Establecimientos $establecimiento)
    {
        $fileapk = $establecimiento->imagen;
        File::delete(public_path().'/img/establecimientos/'.$fileapk);

        $establecimiento->delete();
        return redirect()->route('establecimientos.index');
    }
}
