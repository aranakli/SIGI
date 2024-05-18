<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Transaccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$transaccion = Transaccion::all();
        $transacciones = DB::table('transacciones')
            ->join('productos', 'transacciones.producto_id', '=', 'productos.id')
            ->select('transacciones.*', 'productos.nombre')
            ->get();
        return json_encode(['transacciones'=>$transacciones]);
    }

    public function store(Request $request)
    {
        $transaccion = new Transaccion();
        //$transaccion->id = strtoupper($request->id);
        $transaccion->tipo = $request->tipo;
        $transaccion->producto_id = $request->producto_id;
        $transaccion->cantidad = $request->cantidad;
        $transaccion->fecha = $request->fecha;
        $transaccion->save();

        $transacciones = DB::table('transacciones')
            ->join('productos', 'transacciones.producto_id', '=', 'productos.id')
            ->select('transacciones.*', 'productos.nombre')
            ->get();
        return json_encode(['transacciones'=>$transacciones]);
    }

    public function show($id)
    {
        $transaccion= Transaccion::find($id);
        $productos = DB::table('productos')
        ->orderBy('nombre')
        ->get();
        return json_encode(['transacciones' => $transaccion, 'productos' => $productos]);
    }

    public function update(Request $request, $id)
    {
        $transaccion= Transaccion::find($id);
        $transaccion->tipo = $request->tipo;
        $transaccion->producto_id = $request->producto_id;
        $transaccion->cantidad = $request->cantidad;
        $transaccion->fecha = $request->fecha;
        $transaccion->save();
        $transacciones = DB::table('transacciones')
            ->join('productos', 'transacciones.producto_id', '=', 'productos.id')
            ->select('transacciones.*', 'productos.nombre')
            ->get();
        return json_encode(['transacciones' => $transacciones]);
    }

    public function destroy( $id)
    {
        $transaccion= Transaccion::find($id);
        $transaccion->delete();

        $transacciones = DB::table('transacciones')
            ->join('productos', 'transacciones.producto_id', '=', 'productos.id')
            ->select('transacciones.*', 'productos.nombre')
            ->get();
        return json_encode(['transacciones' => $transacciones]);
    }
}
