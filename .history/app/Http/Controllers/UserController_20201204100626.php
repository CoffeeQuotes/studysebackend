<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function login()
    {
        if  (Auth::attempt(['email' => request('email'), 'password' => request('password')]))
        {
            $user = Auth::user();
            $success['token'] = $user->createToken('appToken')->accessToken;

            return response()->json(
                [
                    'success' => true,
                    'token' => $success,
                    'user' => $user
                ]
            );

        }
    }
}
