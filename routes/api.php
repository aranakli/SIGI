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
<?php

use App\Http\Controllers\api\CategoriaController;
use App\Http\Controllers\api\ProductoController;
use App\Http\Controllers\api\TransaccionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/productos', [ProductoController::class, 'index'])->name('productos');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');

Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
Route::put('/categorias/{categoria}', [CategoriaController::class, 'update'])->name('categorias.update');
Route::get('/categorias/{categoria}', [CategoriaController::class, 'show'])->name('categorias.show');

Route::get('/transacciones', [TransaccionController::class, 'index'])->name('transacciones');
Route::post('/transacciones', [TransaccionController::class, 'store'])->name('transacciones.store');
Route::delete('/transacciones/{transaccion}', [TransaccionController::class, 'destroy'])->name('transacciones.destroy');
Route::put('/transacciones/{transaccion}', [TransaccionController::class, 'update'])->name('transacciones.update');
Route::get('/transacciones/{transaccion}', [Transaccion::class, 'show'])->name('transacciones.show');
