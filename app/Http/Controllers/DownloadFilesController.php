<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archivos;

class DownloadFilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$archivos = Archivos::paginate(20);

       // $files = Archivos::all()-> where('id', '=', $id);
        return view('welcome');
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
 
        $files = Archivos::all()-> where('id_file', '=', $id);
        return view('filedownload.download', compact('files') );
    }

    public function downloadfile($id)
    {


        
        $files = Archivos::find($id);

        $path = public_path('archivosclientes/'.$files->file);

        return response()->file($path ,[
            'Content-Type'=>'application/vnd.android.package-archive',
            'Content-Disposition'=> 'attachment; filename='.$files->file,
        ]) ;

       //return response()->json($archivos->file);
       // return response()->file(public_path('archivosclientes/'.$files->file, $headers));
          

        //return view('filedownload.download', compact('files') );
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
