<?php

namespace App\Services;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Laravel\Sanctum\PersonalAccessToken;

class AuthService
{
    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function getToken($user = null): string
    {
        $user = $user ?? auth()->user();
        return $user->createToken('token')->plainTextToken;
    }

    public function login(LoginRequest $request): ?array
    {
        $credentials = $request->only('email', 'password');
        if(!auth()->attempt($credentials)){
            return null;
        }
        return [
            'token' => $this->getToken(),
            'user' => auth()->user()
        ];
    }

    public function register(RegisterRequest $request): array
    {
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ];

        $user = User::query()->create($userData);
        return [
            'token' => $this->getToken($user),
            'user' => $user
        ];
    }

    public function logout(): void
    {
        $this->user->currentAccessToken()->delete();
    }
}
