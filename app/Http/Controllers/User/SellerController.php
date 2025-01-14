<?php

namespace App\Http\Controllers\User;

use App\Exceptions\InternalServerExcepion;
use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\SellerRequest;
use App\Repositories\Interfaces\User\SellerRepositoriesInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    protected $repository;
    public function __construct(SellerRepositoriesInterface $repository)
    {
        $this->repository = $repository;
    }

    public function createSeller(SellerRequest $request): JsonResponse
    {
        $data = $request->validated();
        $seller = $this->repository->createSeller($data);

        return response()->json([
            'seller' => $seller
        ], 201);
    }

    public function getSeller(int $user_id): JsonResponse
    {
        $seller = $this->repository->getSeller($user_id)->first();
        return response()->json([
            'seller' => $seller
        ], 200);
    }
}
