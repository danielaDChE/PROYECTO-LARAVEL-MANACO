<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        //validar si esta llegando el dato email y password
     $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    //buscar usuario por email
    $user = User::where('email', $request->email)->first();
    //validar credenciales
    if (!$user || !Hash::check($request->password, $user->password))
    {
        return response()->json(['message' => 'Credenciales incorrectas'], 401);    
    }
    //crear token
    $token = $user->createToken('auth_token')->plainTextToken;
    return response()->json([
        'message' => 'Login exitoso',   
        'token' => $token,
        'user' => $user,
    ], 200);
    }
public function register(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);

    // Create a new user instance
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Create a token for the user
    $token = $user->createToken('api_token')->plainTextToken;

    return response()->json([
        'message' => 'Registro exitoso del usuario',
        'token' => $token,
        'user' => $user,
    ], 201);
}
}   
