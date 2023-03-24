<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(
        private UserService $userService
    ) {
    }

    public function store(UserRequest $request): JsonResponse
    {
        $user = $this->userService->saveUser($request);
        return response()->json([
            'message' => 'User created succesfully',
            'user' => $user
        ], 201);
    }

    public function index(): JsonResponse
    {
        $users = $this->userService->getUsers();
        return response()->json([
            'users' => $users
        ], 200);
    }

    public function update(UpdateUserRequest $request, User $user): JsonResponse
    {
        $user = $this->userService->updateUser($request, $user);
        return response()->json([
            'message' => 'User updated succesfully',
            'user' => $user
        ], 200);
    }

    public function destroy(User $user): JsonResponse
    {
        $user->delete();
        return response()->json([
            'message' => 'User deleted succesfully'
        ], 200);
    }
}
