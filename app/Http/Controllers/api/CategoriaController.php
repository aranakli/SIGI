<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$categoria = Categoria::all();
        $categorias = DB::table('categorias')
            ->select('categorias.*')
            ->get();
        return json_encode(['categorias'=>$categorias]);
    }

    public function store(Request $request)
    {
        $categoria = new Categoria();
        //$categoria->id = strtoupper($request->id);
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();

        $categorias = DB::table('categorias')
            ->select('categorias.*')
            ->get();
        return json_encode(['categorias'=>$categorias]);
    }

    public function show($id)
    {
        $categoria= Categoria::find($id);
        return json_encode(['categoria' => $categoria]);
    }

    public function update(Request $request, $id)
    {
        $categoria= Categoria::find($id);
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();
        $categorias = DB::table('categorias')
            ->select('categorias.*')
            ->get();
        return json_encode(['categorias' => $categorias]);
    }

    public function destroy( $id)
    {
        $categoria= Categoria::find($id);
        $categoria->delete();

        $categorias = DB::table('categorias')
            ->select('categorias.*')
            ->get();
        return json_encode(['categorias' => $categorias]);
    }
}
