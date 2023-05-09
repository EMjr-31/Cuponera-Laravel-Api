<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuponControllerAPI;
use App\Http\Controllers\VentaControllerAPI;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(CuponControllerAPI::class)->group(function(){
    Route::get('/cupon','index');
    Route::get('/cupon/{id}','show');
    Route::post('/cupon','store');
    Route::put('/cupon/{id}','update');
    Route::delete('/cupon/{id}','destroy');
});

Route::middleware('auth:sanctum')->controller(VentaControllerAPI::class)->group(function(){
    Route::get('/venta','index');
    Route::get('/venta/{id}','show');
    Route::post('/venta','store');
    Route::put('/venta/{id}','update');
    Route::delete('/venta/{id}','destroy');
});



Route::controller(LoginController::class)->group(function(){
    Route::post('/usuario','login');
    
});

Route::middleware('auth:sanctum')->controller(LoginController::class)->group(function(){
    Route::post('/usuario/perfil','perfil');
    Route::post('/usuario/logout','logout');
});
