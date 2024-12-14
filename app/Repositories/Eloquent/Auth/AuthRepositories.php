<?php

namespace App\Repositories\Eloquent\Auth;

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

    if (! $token = Auth::attempt($credentials)) {
      throw new UnAuthorizeException('Credenciales Incorrectas');
    }

    return response()->json([
      'token' => $token,
      'user' => $this->model->where('email', $data['email'])->first()
    ], 200);
  }
}
