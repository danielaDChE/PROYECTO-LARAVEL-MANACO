<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;


class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Devolver todas las categorias POST
        return response()->json(Categoria::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validadion GET
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
        ]);
        $categoria = Categoria::create($request->all());
        return response()->json([
            'mensaje' => 'Categoria creada exitosamente',
            'categoria' => $categoria
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //mostrar una categoria GET
        //Buscar la categoria por ID
        $categoria = Categoria::find($id);
        if (!$categoria) {
            return response()->json(['mensaje' => 'Categoria no encontrada'], 404);
    }
        return response()->json($categoria,200);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Buscammos la categoria por ID para actualizarla PUT
        $categoria = Categoria::find($id);
        if (!$categoria) {
            return response()->json(['mensaje' => 'Categoria no encontrada'], 404); 
    }
        //Validamos los datos
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
        ]);
        //Actualizamos la categoria
        $categoria->update($request->all());
        return response()->json([
            'mensaje' => 'Categoria actualizada exitosamente',
            'categoria' => $categoria
        ], 200);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Eliminamos la categoria por ID DELETE
        $categoria = Categoria::find($id);
        if (!$categoria) {
       return response()->json(['mensaje' => 'Categoria no encontrada'], 404);
        }
        $categoria->delete();
        return response()->json(['mensaje' => 'Categoria eliminada exitosamente'], 200);
    }
}
