<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Adapter\TotalOrderCountAdapter;
use Src\Interface\OrderCountInterface;
use Src\Interface\UserRepositoryInterface;
use Src\Repository\OrderCountRepository;
use Src\Repository\UserRepository;
use Src\Service\OrderService;
use Src\Service\UserService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application service.
     */
    public function register(): void
    {

        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(OrderCountInterface::class, OrderCountRepository::class);


        $this->app->bind(UserService::class, function ($app) {
            return new UserService(
                $app->make(UserRepositoryInterface::class),
                $app->make(OrderCountInterface::class), // change adapter if you want to use microservice
            );
        });


        $this->app->bind(OrderService::class, function ($app) {
            return new OrderService(
                $app->make(OrderCountInterface::class),
            );
        });
    }

    /**
     * Bootstrap any application service.
     */
    public function boot(): void
    {
        //
    }
}
