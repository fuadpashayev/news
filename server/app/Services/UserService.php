<?php

namespace App\Services;

use App\Http\Requests\Users\UserUpdateRequest;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;

class UserService
{

    public ?Authenticatable $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

    /**
     * Update user data from request and return updated user data
     *
     * @param UserUpdateRequest $request
     * @return Authenticatable
     */
    public function update(UserUpdateRequest $request): Authenticatable
    {
        $data = ['name' => $request->name];

        if($request->password) {
            $data['password'] = $request->password;
        }

        $this->user->update($data);

        return $this->user;
    }
}
