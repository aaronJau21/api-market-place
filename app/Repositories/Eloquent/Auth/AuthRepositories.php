<?php

namespace App\Repositories\Eloquent\Auth;

use App\Exceptions\BadRequestException;
use App\Exceptions\NotPermissionException;
use App\Exceptions\UnAuthorizeException;
use App\Models\User;
use App\Repositories\Interfaces\Auth\AuthRepositoriesInterface;
use Illuminate\Support\Facades\Auth;

class AuthRepositories implements AuthRepositoriesInterface
{
    protected $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function login(array $data)
    {
        $credentials = request(['email', 'password']);

        if (! $token = Auth::guard('api')->attempt($credentials)) {
            throw new UnAuthorizeException('Credenciales Incorrectas');
        }
        $user = $this->model->where('email', $data['email'])->first();
        if (!$user->confirm_count) throw new  BadRequestException('Falta confirmar el correo, ingrese a su correo');
        if (!$user->status) throw new  NotPermissionException('No esta permitido');

        return response()->json([
            'token' => $token,
            'user' => [
                'name' => $user->full_name,
                'email' => $user->email,
                'role' => $user->role,
            ]
        ], 200);
    }
}
