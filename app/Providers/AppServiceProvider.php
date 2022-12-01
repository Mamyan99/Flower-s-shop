<?php

namespace App\Providers;

use App\Repositories\Read\Product\ProductReadRepository;
use App\Repositories\Read\Product\ProductReadRepositoryInterface;
use App\Repositories\Read\User\UserReadRepository;
use App\Repositories\Read\User\UserReadRepositoryInterface;
use App\Repositories\Write\User\UserWriteRepository;
use App\Repositories\Write\User\UserWriteRepositoryInterface;
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
        //
    }
}
