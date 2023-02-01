<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UserUpdateRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function index(UserService $userService): JsonResponse
    {
        return response()->json($userService->user);
    }

    public function update(UserUpdateRequest $request, UserService $userService): JsonResponse
    {
        $user = $userService->update($request);
        return response()->json($user);
    }
}
