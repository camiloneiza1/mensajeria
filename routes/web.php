<?php

use App\Http\Controllers\MensajeroController;
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

//Consulta todos los mensajeros de la base de datos
Route::get('/mensajeros', [MensajeroController::class, 'index'])->name('mensajero.index');

//Mostrar formulario para crear
Route::get('/mensajeros/create' , [MensajeroController::class, 'create'])->name('mensajero.create');

//Mostrar formulario para editar
Route::get('/mensajeros/{id}' , [MensajeroController::class, 'edit'])->name('mensajero.edit');

//Crea un mensajero en la base de daros
Route::post('/mensajeros/store', [MensajeroController::class, 'store'])->name('mensajero.store');

//Edita un mensajero en la base de daros
Route::put('/mensajeros/update/{id}', [MensajeroController::class, 'update'])->name('mensajero.update');



