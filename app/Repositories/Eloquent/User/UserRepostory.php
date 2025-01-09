<?php

namespace App\Repositories\Eloquent\User;

use App\Exceptions\BadRequestException;
use App\Models\User;
use App\Repositories\Interfaces\User\SellerRepositoriesInterface;
use App\Repositories\Interfaces\User\UserRepositoriesInterface;

class UserRepostory implements UserRepositoriesInterface
{

    protected $model;
    protected $sellerRepository;

    public function __construct(User $user, SellerRepositoriesInterface $seller)
    {
        $this->model = $user;
        $this->sellerRepository = $seller;
    }

    public function createUser(array $data): User
    {
        $exist = $this->model->where('email', $data['email'])->first();

        if ($exist) throw new BadRequestException('Ya existe el usuario');

        $user = $this->model->create($data);
        $sellerData = [
            'user_id' => $user->id,
            'storeName' => $data['full_name']
        ];
        $this->sellerRepository->createSeller($sellerData);

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
