<?php

namespace App\Providers;

use App\Services\AuthService;
use App\Services\CityService;
use App\Services\ClientService;
use App\Services\Impl\Auth\AuthServiceImpl;
use App\Services\Impl\CityServiceImpl;
use App\Services\Impl\ClientServiceImpl;
use App\Services\Impl\OrderServiceImpl;
use App\Services\Impl\PromotionServiceImpl;
use App\Services\Impl\ServiceAndCategoryServiceImpl;
use App\Services\Impl\SpecialistServiceImpl;
use App\Services\Impl\TransactionServiceImpl;
use App\Services\Impl\UnitServiceImpl;
use App\Services\Impl\VerificationCodeServiceImpl;
use App\Services\OrderService;
use App\Services\PromotionService;
use App\Services\ServiceAndCategoryService;
use App\Services\SpecialistService;
use App\Services\TransactionService;
use App\Services\UnitsService;
use App\Services\VerificationCodeService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(OrderService::class, function ($app) {
            return new OrderServiceImpl();
        });
        $this->app->bind(SpecialistService::class, function ($app) {
            return new SpecialistServiceImpl();
        });
        $this->app->bind(AuthService::class, function ($app) {
            return new AuthServiceImpl();
        });
        $this->app->bind(CityService::class, function ($app) {
            return new CityServiceImpl();
        });
        $this->app->bind(ServiceAndCategoryService::class, function ($app) {
            return new ServiceAndCategoryServiceImpl();
        });
        $this->app->bind(ClientService::class, function ($app) {
            return new ClientServiceImpl();
        });
        $this->app->bind(TransactionService::class, function ($app) {
            return new TransactionServiceImpl();
        });
        $this->app->bind(PromotionService::class, function ($app) {
            return new PromotionServiceImpl();
        });
        $this->app->bind(VerificationCodeService::class, function ($app) {
            return new VerificationCodeServiceImpl();
        });
        $this->app->bind(UnitsService::class, function ($app) {
            return new UnitServiceImpl();
        });
    }
}
