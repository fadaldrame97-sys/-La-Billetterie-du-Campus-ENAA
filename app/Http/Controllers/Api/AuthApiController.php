<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthApiController extends Controller
{
    public function __construct(
        protected AuthService $authService
    ) {}

    public function login(LoginRequest $request)
{
    $result = $this->authService->login(
        $request->validated()
    );

    if (!$result) {
        return response()->json([
            'message' => 'Email ou mot de passe incorrect.'
        ], 401);
    }

    return response()->json([
        'message' => 'Connexion réussie.',
        'token' => $result['token'],
        'user' => $result['user']
    ]);
    }

    public function logout()
    {
        $this->authService->logout();

        return response()->json([
            'message' => 'Déconnexion réussie.'
        ]);
    }
}
