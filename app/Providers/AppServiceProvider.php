<?php

namespace App\Providers;

use App\Repositories\Eloquent\Auth\AuthRepositories;
use App\Repositories\Eloquent\User\SellerRepository;
use App\Repositories\Eloquent\User\UserRepostory;
use App\Repositories\Interfaces\Auth\AuthRepositoriesInterface;
use App\Repositories\Interfaces\User\SellerRepositoriesInterface;
use App\Repositories\Interfaces\User\UserRepositoriesInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // User
        $this->app->bind(UserRepositoriesInterface::class, UserRepostory::class);
        $this->app->bind(AuthRepositoriesInterface::class, AuthRepositories::class);

        // Sellers
        $this->app->bind(SellerRepositoriesInterface::class, SellerRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
