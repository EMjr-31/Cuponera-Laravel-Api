<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuponController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\RubroController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('cupon',CuponController::class);

Route::controller(EmpresaController::class)->group(function(){
    Route::get('/empresa','index');
    Route::get('/empresa/create','create');
    Route::get('/empresa/{id}','show');
    Route::post('/empresa','store');
    Route::put('/empresa/{id}','update');
    Route::delete('/empresa/{id}','destroy');
});

Route::controller(VentaController::class)->group(function(){
    Route::get('/venta','index');
    Route::get('/venta/create','create');
    Route::get('/venta/{id}','show');
    Route::post('/venta','store');
    Route::put('/venta/{id}','update');
    Route::delete('/venta/{id}','destroy');
});

Route::controller(RubroController::class)->group(function(){
    Route::get('/rubro','index');
    Route::get('/rubro/create','create');
    Route::get('/rubro/{id}','show');
    Route::post('/rubro','store');
    Route::put('/rubro/{id}','update');
    Route::delete('/rubro/{id}','destroy');
});


