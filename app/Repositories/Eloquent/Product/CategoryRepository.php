<?php

namespace App\Repositories\Eloquent\Product;

use App\Models\Category;
use App\Repositories\Interfaces\Product\CategoryRepositoriesInterface;

class CategoryRepository implements CategoryRepositoriesInterface
{
    private $modelCategory;
    public function __construct(Category $category)
    {
        $this->modelCategory = $category;
    }
    public function createCategory(array $data): Category
    {
        $category = $this->modelCategory->create($data);
        return $category;
    }
}
