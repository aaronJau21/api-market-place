<?php

namespace App\Repositories\Interfaces\Product;

use App\Models\Category;

interface CategoryRepositoriesInterface
{
    public function createCategory(array $data): Category;
}
