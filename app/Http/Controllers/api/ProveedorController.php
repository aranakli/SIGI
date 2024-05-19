<?php

namespace App\Http\Controllers\api;

use App\Models\Proveedor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource proveedor.
     */
    public function index()
    {
        $proveedores = DB::table('proveedores')
            ->select('proveedores.*')
            ->get();
        return json_encode(['proveedores' => $proveedores]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $proveedor = new Proveedor();
        $proveedor->nombre = $request->nombre;
        $proveedor->contacto = $request->contacto;
        $proveedor->save();

        return json_encode(['proveedor' => $proveedor]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $proveedor = Proveedor::find($id);
        return json_encode(['proveedor' => $proveedor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $proveedor = Proveedor::find($id);
        $proveedor->nombre = $request->nombre;
        $proveedor->contacto = $request->contacto;
        $proveedor->save();
        return json_encode(['proveedor' => $proveedor]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $proveedor = Proveedor::find($id);
        $proveedor->delete();
        $proveedores = DB::table('proveedores')
            ->select('proveedores.*')
            ->get();
        return json_encode(['proveedores' => $proveedores]);
    }
}
