<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('analises', App\Http\Controllers\analisisController::class);


Route::resource('productos', App\Http\Controllers\ProductosController::class);


Route::resource('tiendas', App\Http\Controllers\tiendaController::class);


Route::resource('categorias', App\Http\Controllers\categoriasController::class);
