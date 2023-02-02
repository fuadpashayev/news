<?php

namespace App\Services;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;

class AuthService
{
    public function __construct()
    {
        $this->user = auth()->user();
    }

    /**
     * Get token for user
     *
     * @param $user
     * @return string
     */
    public function getToken($user = null): string
    {
        $user = $user ?? $this->user;
        return $user->createToken('token')->plainTextToken;
    }

    /**
     * Login user
     *
     * @param LoginRequest $request
     * @return array|null
     */
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

    /**
     * Register user
     *
     * @param RegisterRequest $request
     * @return array
     */
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

    /**
     * Logout user
     *
     * @return void
     */
    public function logout(): void
    {
        $this->user->currentAccessToken()->delete();
    }
}
