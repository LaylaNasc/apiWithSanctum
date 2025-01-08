<?php

namespace App\Http\Controllers;

use App\Services\ApiResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //validação 
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->input('email');
        $password = $request->input ('password');
        $attempt = auth()->attempt([
            'email' =>$email,
            'password' => $password
        ]);

        if(!$attempt){
            return ApiResponse::unauthorized();
        }

        //auutentencação do usuário
        $user = auth()->user();
        //assume o tempo de expiração que esta configurado no sanctum
        $token = $user->createToken($user->name)->plainTextToken;

        //retorna o acesso token
        return ApiResponse::success([
            'user' => $user->name,
            'email' => $user->email,
            'token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return ApiResponse::success('Logout feito com sucesso!');
    }
}
