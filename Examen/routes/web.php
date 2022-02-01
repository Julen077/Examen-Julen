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

Route::view('/', 'enunciado');

Route::get('/admin', [App\Http\Controllers\ControladorAdmin::class, 'mostrar']);

Route::get('/admin/asignarVuelo', [App\Http\Controllers\ControladorAdmin::class, 'asignarVuelo']);

Route::post('/admin/asignarVuelo', [App\Http\Controllers\ControladorAdmin::class, 'escogerVueloyAvion'])->name('escogerVueloyAvion');

Route::delete('/admin/asignarVuelo/{id}', [App\Http\Controllers\ControladorAdmin::class, 'eliminarSeleccion'])->name('ruta_para_eliminar');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

