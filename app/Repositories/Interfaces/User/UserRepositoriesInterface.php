<?php

namespace App\Repositories\Interfaces\User;

use App\Models\User;

interface UserRepositoriesInterface
{
  public function createUser(array $data): User;
  public function getUsers();
}
