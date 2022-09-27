<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class LoginController extends Controller
{
    public function login(Request $request)
    {
        //To-DO: validar request...
        $credentials = $request->only('email', 'password');

        if(!auth()->attempt($credentials)) 
            abort(401, 'invalid credentials');

           // $token = auth()->user()->createAccessToken();


            $token = $request->user()->createToken('auth_token');

            return response()
            ->json([
                'data' => [
                    'token' => $token->plainTextToken
                ]
            ]);   

           
    }

    public function logout(Request $request)
    {
        //remove todos os tokens do usuário
        //$request->user()->tokens()->delete();

        //Remove apenas o token do usuario logado
        $request->user()->currentAccessToken()->delete();

        return response()
            ->json([],200);   
    }
}
