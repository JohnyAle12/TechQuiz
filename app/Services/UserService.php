<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserService
{
    public function saveUser(UserRequest $request): User
    {
        return User::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'identification' => $request->identification,
            'email' => $request->email,
            'country' => $request->country,
            'address' => $request->address,
            'mobile' => $request->mobile,
        ]);
    }

    public function getUsers(): array
    {
        return User::orderBy('created_at', 'desc')->get()->toArray();
    }

    public function getUsersByCountry(): array
    {
        return User::selectRaw("country, count(*) AS count")
            ->groupBy('country')
            ->orderBy('count', 'desc')
            ->get()
            ->toArray();
    }

    public function updateUser(UpdateUserRequest $request, User $user): User
    {
        $user->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'country' => $request->country,
            'address' => $request->address,
            'mobile' => $request->mobile,
        ]);

        return $user;
    }
}
