<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function login(LoginRequest $request, AuthService $authService): JsonResponse
    {
        $response = $authService->login($request);
        if(!$response){
            return response()->json(['error' => 'Email or password is wrong'], 401);
        }
        return response()->json($response);
    }

    public function register(RegisterRequest $request, AuthService $authService): JsonResponse
    {
        $response = $authService->register($request);
        return response()->json($response);
    }

    public function logout(AuthService $authService): JsonResponse
    {
        $authService->logout();
        return response()->json(['message' => 'Logged out']);
    }
}
