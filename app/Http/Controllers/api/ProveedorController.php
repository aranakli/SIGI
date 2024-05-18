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
        $proveedores = new Proveedor();
        $proveedores->name = $request->name;
        $proveedores->description = $request->description;
        $proveedores->save();
        return json_encode(['proveedor' => $proveedores]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $proveedores = Proveedor::find($id);
        return json_encode(['proveedor' => $proveedores]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $proveedores = Proveedor::find($id);
        $proveedores->name = $request->name;
        $proveedores->description = $request->description;
        $proveedores->save();
        return json_encode(['proveedor' => $proveedores]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proveedores = Proveedor::find($id);
        $proveedores->delete();
        $proveedores = DB::table('proveedores')
            ->select('proveedores.*')
            ->get();
        return json_encode(['proveedores' => $proveedores]);
    }
}
