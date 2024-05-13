<?php

use Illuminate\Support\Facades\Route;

//controladores creados
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EntradasController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\ValidadosController;

use App\Http\Controllers\ActualizarController;


/*inicio por defecto
Route::get('/', function () {
    return view('home');
});

*/

Route::group(['middleware' => 'auth'], function () {

    
    //Route::get('/administrador', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/* ruta home por defecto
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/


//rutas de los controladores creados


Route::resource('administrador', AdministradorController::class);
Route::resource('Validados', ValidadosController::class);
Route::resource('Entradas', EntradasController::class);




Route::resource('download', DownloadFilesController::class);

Route::get('downloadfile/{id}', [DownloadFilesController::class, 'downloadfile'])
    ->name('downloadfile');


Route::get('/actualizar-seccion', [ActualizarController::class, 'actualizarSeccion'])->name('actualizar-seccion');



