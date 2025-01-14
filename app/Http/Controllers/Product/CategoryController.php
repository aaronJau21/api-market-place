<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Repositories\Interfaces\Product\CategoryRepositoriesInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $repository;

    public function __construct(CategoryRepositoriesInterface $repository)
    {
        $this->repository = $repository;
    }

    public function createCategory(CreateCategoryRequest $request): JsonResponse
    {
        $data = $request->validated();
        $category = $this->repository->createCategory($data);

        return response()->json([
            'category' => $category
        ], 200);
    }
}
