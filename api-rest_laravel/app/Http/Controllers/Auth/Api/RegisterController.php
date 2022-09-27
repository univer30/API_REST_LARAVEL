<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function Register(Request $request, User $user)
    {
        //To-DO: validar request...
        $userData= $request->only('name','email', 'password');
        
        $userData['password'] = bcrypt($userData['password']);

           if(!$user = $user->create($userData))
              abort(500, "Error to create a new user...");

            return response()
                      ->json([
                          'data' => [
                             'user'=> $user
                           ]
                     ]);


        
    }
}
