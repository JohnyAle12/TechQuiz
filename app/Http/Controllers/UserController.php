<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
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
}
