<?php

namespace App\Http\Controllers\AuthAPI;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->only(['email', 'password']);
       if (!$token = auth()->attempt($credentials)) {
           return response()->json(['error' => 'Unauthorized'], 401);
       }
       return response()->json([
           'token' => $token,
           'expires' => auth()->factory()->getTTL() * 60,
       ])->header('Authorization', $token);
    }

    public function register(Request $request) {

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        return response()->json([
            'status' => 'sucess',
            'message' => 'Cadastrado com sucesso!'
        ], 201);
    }

    public function refresh(Request $request) {
        $token = auth('api')->refresh();
        return response()->json([
            'token' => $token,
            'expires' => auth('api')->factory()->getTTL() * 60,
        ])->header('Authorization', $token);
    }

    public function user(Request $request) {
        return $request->user();
    }
}
