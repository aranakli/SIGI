<?php

namespace App\Http\Controllers\api;

use App\Models\Inventario;
use App\Models\Proveedor;
use App\Models\Producto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventarios = DB::table('inventarios')
            ->join('productos', 'producto_id', '=', 'productos.id')
            ->join('proveedores', 'proveedor_id', '=', 'proveedores.id')
            ->select('inventarios.*', 'productos.nombre as producto_nombre', 'proveedores.nombre as proveedor_nombre')
            ->get();
        return json_encode(['inventarios' => $inventarios ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inventario = new Inventario();
        $inventario->producto_id = $request->producto_id;
        $inventario->proveedor_id = $request->proveedor_id;
        $inventario->cantidad = $request->cantidad;
        $inventario->save();
        return json_encode(['inventario' => $inventario]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $inventario = Inventario::find($id);
        $proveedores = DB::table('proveedores')
            ->orderBy('nombre')
            ->get();
        $productos = DB::table('productos')
            ->orderBy('nombre')
            ->get();
        return json_encode(['inventario' => $inventario, 'proveedores' => $proveedores, 'productos' => $productos ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $inventario = Inventario::find($id);
        $inventario->producto_id = $request->producto_id;
        $inventario->proveedor_id = $request->proveedor_id;
        $inventario->cantidad = $request->cantidad;
        $inventario->save();
        return json_encode(['inventario' => $inventario]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inventario = Inventario::find($id);
        $inventario->delete();
        $inventarios = DB::table('inventarios')
            ->join('proveedores', 'inventarios.proveedor_id', '=', 'proveedores.id')
            ->join('productos', 'inventarios.producto_id', '=', 'productos.id')
            ->select('inventarios.*', 'proveedores.nombre as proveedor_nombre', 'productos.nombre as producto_nombre')
            ->get();
        return json_encode(['inventarios' => $inventarios, 'success' => true]);
    }
}
