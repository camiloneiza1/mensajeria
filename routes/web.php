<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MensajeroController;
use App\Http\Controllers\OrdenController;
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
    return view('home');
});


//-------------------------RUTAS CLIENTES-------------------------------
//Consulta todos los clientes de la base de datos
Route::get('/clientes', [ClienteController::class, 'index'])->name('cliente.index');

//Mostrar formulario para crear
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('cliente.create');

//Mostrar formulario para editar
Route::get('/clientes/{id}', [ClienteController::class, 'edit'])->name('cliente.edit');

//Crea un cliente en la base de daros
Route::post('/clientes/store', [ClienteController::class, 'store'])->name('cliente.store');

//Edita un cliente en la base de daros
Route::put('/clientes/update/{id}', [ClienteController::class, 'update'])->name('cliente.update');

//Eliminar un cliente de la base de datos
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])->name('cliente.destroy');


//-------------------------RUTAS ORDENES-------------------------------
//Consulta todas las ordenes de la base de datos
Route::get('/ordenes', [OrdenController::class, 'index'])->name('orden.index');

//Mostrar formulario para crear
Route::get('/ordenes/create', [OrdenController::class, 'create'])->name('orden.create');

//Mostrar formulario para crear
Route::get('/ordenes/calculaCosto', [OrdenController::class, 'calculaCosto'])->name('orden.calculaCosto');

//Mostrar formulario para editar
Route::get('/ordenes/{id}', [OrdenController::class, 'edit'])->name('orden.edit');

//Crea un orden en la base de daros
Route::post('/ordenes/store', [OrdenController::class, 'store'])->name('orden.store');

//Edita un orden en la base de daros
Route::put('/ordenes/update/{id}', [OrdenController::class, 'update'])->name('orden.update');

//Eliminar un orden de la base de datos
Route::delete('/ordenes/{id}', [OrdenController::class, 'destroy'])->name('orden.destroy');
