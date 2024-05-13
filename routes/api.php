<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiUserAuthController;
use App\Http\Controllers\Api\ApiValidaController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group([['x_api_key'], 'prefix' => 'validacion'], function () {
    Route::controller(\App\Http\Controllers\ApiValidaController::class)->group(function (){
        
        Route::get('Codigos/{boleta}', [ApiValidaController::class,'Codigo']);
    });
});
/*

Route::group(['prefix' => 'impresion'], function () {
    Route::controller(\App\Http\Controllers\ApiImpresionController::class)->group(function (){
        Route::post('producto', [ApiImpresionController::class,'productos']);
         Route::get('precio/{precio}', [ApiImpresionController::class,'show']);
    });
});


Route::group(['prefix' => 'impresion'], function () {
    Route::controller(\App\Http\Controllers\ApiImpresionController::class)->group(function (){
        Route::post('producto', [ApiImpresionController::class,'productos']);Ñ
        Route::get('precio/{precio}', [ApiImpresionController::class,'show']);
    });
});



*/