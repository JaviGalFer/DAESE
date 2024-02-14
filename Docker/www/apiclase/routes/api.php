<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
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

//Route es el que manda y dice que cuando reciba una peticion de tipo get a la ruta productos, 
//llame al controlador ProductoController y a su metodo index.
// Route::get('productos', [ProductoController::class, 'index']);

// Route::post('productos', [ProductoController::class, 'store']);

// Route::get('productos/{id}', [ProductoController::class, 'show']);

Route::resource('/productos', ProductoController::class);
