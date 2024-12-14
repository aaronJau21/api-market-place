<?php

namespace App\Providers;

use App\Repositories\Eloquent\Auth\AuthRepositories;
use App\Repositories\Eloquent\User\UserRepostory;
use App\Repositories\Interfaces\Auth\AuthRepositoriesInterface;
use App\Repositories\Interfaces\User\UserRepositoriesInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    $this->app->bind(UserRepositoriesInterface::class, UserRepostory::class);
    $this->app->bind(AuthRepositoriesInterface::class, AuthRepositories::class);
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    //
  }
}
