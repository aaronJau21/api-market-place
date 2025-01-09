<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\InternalServerExcepion;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Repositories\Interfaces\Auth\AuthRepositoriesInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $repository;

    public function __construct(AuthRepositoriesInterface $authRepositoriesInterface)
    {
        $this->repository = $authRepositoriesInterface;
    }


    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $login = $this->repository->login($data);
        return $login;
    }

    public function loginClient(LoginRequest $request)
    {
        $data = $request->validated();
        $login = $this->repository->loginClient($data);
        return $login;
    }
}
