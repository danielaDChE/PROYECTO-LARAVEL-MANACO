<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Devolver todos los clientes POST, crea un cliente
        return response()->json(Cliente::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validadion GET
        $request->validate([ 
            'nombres' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'celular' => 'required',
            'nit' => 'nullable',
            
        ]);
        $cliente = Cliente::create($request->all());
        return response()->json([
            'mensaje' => 'Cliente creado exitosamente',
            'cliente' => $cliente
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //mostrar un cliente GET
        //Buscar en clientes por ID
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json(['mensaje' => 'Cliente no encontrado'], 404);   
    }
        return response()->json($cliente, 200);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Buscammos a clientes por ID para actualizarla PUT
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json(['mensaje' => 'Cliente no encontrado'], 404);
    }
        //Validamos los datos
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'celular' => 'required',
            'nit' => 'nullable',
        ]);
        $cliente->update($request->all());
        return response()->json([
            'mensaje' => 'Cliente actualizado exitosamente',
            'cliente' => $cliente
        ], 200);
    }   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Eliminamos al cliente por ID DELETE
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json(['mensaje' => 'Cliente no encontrado'], 404);
    }
        $cliente->delete();
        return response()->json(['mensaje' => 'Cliente eliminado exitosamente'], 200);
    }
}
