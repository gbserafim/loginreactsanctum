<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario; // Importa o modelo de Usuario
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validação das credenciais
        $credentials = $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);
    
        // Verifica se as credenciais são válidas
        $user = Usuario::where('email', $request->email)->first();
    
        if ($user && Hash::check($request->senha, $user->senha)) {
            // Gera o token de autenticação
            $token = $user->createToken('YourAppName')->plainTextToken;
    
            return response()->json([
                'message' => 'Login bem-sucedido',
                'token' => $token,
            ]);
        }
    
        return response()->json([
            'message' => 'Credenciais inválidas',
        ], 401);
    }
    

    // Método de logout
    public function logout(Request $request)
    {
        // Apaga o token de autenticação atual
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out']);
    }
}


