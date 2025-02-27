<?php

namespace App\Http\Controllers\User;

use App\Exceptions\InternalServerExcepion;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserCreateRequest;
use App\Repositories\Interfaces\User\UserRepositoriesInterface;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    protected $repository;
    public function __construct(UserRepositoriesInterface $repository)
    {
        $this->repository = $repository;
    }


    public function createUser(UserCreateRequest $request): JsonResponse
    {
        $data = $request->validated();
        $user = $this->repository->createUser($data);

        return response()->json([
            'message' => 'User created successfully',
            'data' => $user
        ], 201);
    }

    public function getUsers(): JsonResponse
    {
        $users = $this->repository->getUsers();
        return $users;
    }

    public function getUser(int $id)
    {
        $user = $this->repository->getUser($id);
        return $user;
    }
}
