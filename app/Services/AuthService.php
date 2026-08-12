<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login(array $data)
    {
        if (!Auth::attempt($data)) {
            return null;
        }

        $user = Auth::user();

        return [
            'token' => $user->createToken('auth_token')->plainTextToken,
            'user' => $user
        ];
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
    }
}