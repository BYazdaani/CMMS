<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request)
    {

        $data = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255',],
            'password' => ['required', 'string'],
        ]);

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {

            return response([
                "message" => "Bad credentials"
            ], 401);

        }

        $token = $user->createToken('GMAO_App')->plainTextToken;

        return response([
            'token' => $token,
            'user' => $user,
        ], 201);

    }

    public function logout(Request $request)
    {

        auth()->user()->tokens()->delete();

        return [
            "message" => "Logged out"
        ];
    }
}
