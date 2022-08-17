<?php

namespace App\Providers;

use App\czaspracy\Interfaces\BackendRepositoryInterface;
use App\czaspracy\Interfaces\FrontendRepositoryInterface;
use App\czaspracy\Repositories\BackendRepository;
use App\czaspracy\Repositories\FrontendRepository;
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
        $this->app->bind(FrontendRepositoryInterface::class, function (){
            return new FrontendRepository();
        });

        $this->app->bind(BackendRepositoryInterface::class, function (){
            return new BackendRepository();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
