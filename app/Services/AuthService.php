<?php

namespace App\Services;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login(array $data)
    {
        if (!Auth::attempt($data)) {
            return null;
        }

        $user = Auth::user();

        return $user->createToken('auth_token')->plainTextToken;
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
    }
}
