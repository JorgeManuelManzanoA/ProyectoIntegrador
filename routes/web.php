<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\AdminController;

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::match(['get', 'post'], 'admin/categorias', [TipoController::class, 'create'])->name('tipos.create');
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('admin/productos', [ProductoController::class, 'create'])->name('productos.create');
Route::get('/{tipo}/{producto}', [ProductoController::class, 'show'])->name('productos.show');
Route::get('productos/indexByTipo', [ProductoController::class, 'indexByTipo'])->name('productos.indexByTipo');
Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');
Route::post('productos/store', [ProductoController::class, 'store'])->name('productos.store');
Route::delete('/destroy/{id}', [TipoController::class, 'destroy'])->name('tipos.destroy');
Route::get('/', [TipoController::class, 'index'])->name('tipos.index');
Route::get('/{tipo}', [ProductoController::class, 'showByTipo'])->name('productos.showByTipo');
