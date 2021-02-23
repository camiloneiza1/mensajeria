<?php

use App\Http\Controllers\MensajeroController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//-------------------------RUTAS MENSAJEROS-------------------------------
//Consulta todos los mensajeros de la base de datos
Route::get('/mensajeros', [MensajeroController::class, 'index'])->name('mensajero.index');


//Mostrar formulario para editar
Route::get('/mensajeros/{id}', [MensajeroController::class, 'edit'])->name('mensajero.edit');

//Crea un mensajero en la base de daros
Route::post('/mensajeros/store', [MensajeroController::class, 'store'])->name('mensajero.store');

//Edita un mensajero en la base de daros
Route::put('/mensajeros/update/{id}', [MensajeroController::class, 'update'])->name('mensajero.update');

//Eliminar un mensajero de la base de datos
Route::delete('/mensajeros/{id}', [MensajeroController::class, 'destroy'])->name('mensajero.destroy');
