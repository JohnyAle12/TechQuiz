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
        return User::create($request->all());
    }

    public function getUsers(string $query = null): array
    {
        return User::when($query, function($q, $query){
            return $q->where('name', $query)
                ->orWhere('lastname', $query);
        })
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();
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
        $user->update($request->all());
        return $user;
    }
}
