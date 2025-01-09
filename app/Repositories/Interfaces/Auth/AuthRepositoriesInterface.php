<?php

namespace App\Repositories\Interfaces\Auth;

interface AuthRepositoriesInterface
{
  public function login(array $data);
  public function loginClient(array $data);
}
