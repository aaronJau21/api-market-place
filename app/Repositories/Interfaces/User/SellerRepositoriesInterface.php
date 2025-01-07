<?php

namespace App\Repositories\Interfaces\User;

use App\Models\Seller;

interface SellerRepositoriesInterface
{
    public function createSeller(array $data): Seller;
    public function getSeller(int $user_id):Seller;
}
