<?php

namespace App\Repositories\Eloquent\User;

use App\Exceptions\BadRequestException;
use App\Models\User;
use App\Repositories\Interfaces\User\UserRepositoriesInterface;

class UserRepostory implements UserRepositoriesInterface
{

  protected $model;

  public function __construct(User $user)
  {
    $this->model = $user;
  }

  public function createUser(array $data): User
  {

    $exist = $this->model->where('email', $data['email'])->first();

    if ($exist) throw new BadRequestException('Ya existe el usuario');

    $user = $this->model->create($data);

    return $user;
  }

  public function getUsers()
  {
    $user = $this->model->all();
    return response()->json([
      'users' => $user
    ]);
  }
}
