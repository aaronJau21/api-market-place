<?php

namespace App\Repositories\Eloquent\User;

use App\Exceptions\BadRequestException;
use App\Exceptions\NotFoundException;
use App\Models\Seller;
use App\Repositories\Interfaces\User\SellerRepositoriesInterface;

class SellerRepository implements SellerRepositoriesInterface
{
    /**
     * Create a new class instance.
     */
    protected $model;
    public function __construct(Seller $seller)
    {
        $this->model = $seller;
    }
    public function createSeller(array $data): Seller
    {
        $exist = $this->model->where('storeName', $data['storeName'])->first();
        if ($exist) throw new BadRequestException('Ya existe la tienda');

        $store = $this->model->create($data);
        return $store;
    }

    public function getSeller(int $user_id): Seller
    {
        $seller = $this->model->find($user_id);
        if (!$seller) throw new NotFoundException('No existe la tienda');
        return $seller;
    }
}
