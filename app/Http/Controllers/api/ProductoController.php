<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$producto = Producto::all();
        $productos = DB::table('productos')
            ->join('categorias', 'productos.categoria_id', '=', 'categorias.id')
            ->select('productos.*', 'categorias.nombre')
            ->get();
        return json_encode(['productos'=>$productos]);
    }

    public function store(Request $request)
    {
        $producto = new Producto();
        //$producto->id = strtoupper($request->id);
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->categoria_id = $request->categoria_id;
        $producto->save();

        $productos = DB::table('productos')
            ->join('categorias', 'productos.categoria_id', '=', 'categorias.id')
            ->select('productos.*', 'categorias.nombre')
            ->get();
        return json_encode(['productos'=>$productos]);
    }

    public function show($id)
    {
        $producto= Producto::find($id);
        $categorias = DB::table('categorias')
        ->orderBy('nombre')
        ->get();
        return json_encode(['producto' => $producto, 'categorias' => $categorias]);
    }

    public function update(Request $request, $id)
    {
        $producto= Producto::find($id);
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->categoria_id = $request->categoria_id;
        $producto->save();
        $productos = DB::table('productos')
            ->join('categorias', 'productos.categoria_id', '=', 'categorias.id')
            ->select('productos.*', 'categorias.nombre')
            ->get();
        return json_encode(['productos' => $productos]);
    }

    public function destroy( $id)
    {
        $producto= Producto::find($id);
        $producto->delete();

        $productos = DB::table('productos')
            ->join('categorias', 'productos.categoria_id', '=', 'categorias.id')
            ->select('productos.*', 'categorias.nombre')
            ->get();
        return json_encode(['productos' => $productos]);
    }
}
