<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuponController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\RubroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginUserController;

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
    return view('User.Login');
});

Route::middleware('auth:sanctum')->resource('cupon',CuponController::class);
Route::middleware('auth:sanctum')->resource('usuario',UsuarioController::class);
Route::middleware('auth:sanctum')->resource('empresa',EmpresaController::class);
Route::middleware('auth:sanctum')->resource('rubro',RubroController::class);


Route::controller(LoginUserController::class)->group(function(){
    Route::get('/login','login');
    Route::post('/login/verificar','verificar');
    Route::get('/login/logout','logout');
});
