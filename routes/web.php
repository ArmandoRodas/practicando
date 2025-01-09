<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

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

Route::get('/productos', [ProductoController::class, 'index'])->name('producto.index');
Route::get('/productos/crear', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos/crear/store', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/productos/inactivos', [ProductoController::class, 'inactivo'])->name('productos.inactivo'); // Movida arriba
Route::get('/productos/{producto}/editar', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{producto}/update', [ProductoController::class, 'update'])->name('productos.update');
Route::patch('/productos/{producto}/toggle', [ProductoController::class, 'toggleEstado'])->name('productos.toggle');
Route::get('/productos/{producto}', [ProductoController::class, 'view'])->name('productos.view'); 
