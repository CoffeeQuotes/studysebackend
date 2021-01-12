<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
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

        } else {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Invalid Email or Password'
                ], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'phone' => 'digits:10',
                'password' => 'required|min:8'
                ]

        );
    }
}
