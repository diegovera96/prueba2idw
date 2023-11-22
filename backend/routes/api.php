<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get("/products", [\App\Http\Controllers\ProductoController::class,'productos']);
Route::post("/products", [\App\Http\Controllers\ProductoController::class,'agregarProducto']);
Route::put("/products/{producto}", [\App\Http\Controllers\ProductoController::class, 'actualizarProducto']);
Route::delete("/products/{producto}", [\App\Http\Controllers\ProductoController::class, 'eliminarProducto']);
