<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuponController;

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

Route::controller(CuponController::class)->group(function(){
    Route::get('/cupon','index');
    Route::get('/cupon/create','create');
    Route::get('/cupon/{id}','show');
    Route::post('/cupon','store');
    Route::put('/cupon/{id}','update');
    Route::delete('/cupon/{id}','destroy');
});


