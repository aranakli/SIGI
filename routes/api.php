<?php

use App\Http\Controllers\api\ProveedorController;
use App\Http\Controllers\api\ProductoController;
use App\Http\Controllers\api\InventarioController;
use App\Http\Controllers\api\CategoriaController;
use App\Http\Controllers\api\TransaccionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/proveedores', [ProveedorController::class, 'store'])->name('proveedores.store');
Route::get('/proveedores', [ProveedorController::class, 'index'])->name('proveedores.index');
Route::delete('/proveedores/{proveedor}', [ProveedorController::class, 'destroy'])->name('proveedores.destroy');
Route::get('/proveedores/{proveedor}', [ProveedorController::class, 'show'])->name('proveedores.show');
Route::put('/proveedores/{proveedor}', [ProveedorController::class, 'update'])->name('proveedores.update');

Route::post('/inventarios', [InventarioController::class, 'store'])->name('inventarios.store');
Route::get('/inventarios', [InventarioController::class, 'index'])->name('inventarios.index');
Route::delete('/inventarios/{proveedor}', [InventarioController::class, 'destroy'])->name('inventarios.destroy');
Route::get('/inventarios/{proveedor}', [InventarioController::class, 'show'])->name('inventarios.show');
Route::put('/inventarios/{proveedor}', [InventarioController::class, 'update'])->name('inventarios.update');
