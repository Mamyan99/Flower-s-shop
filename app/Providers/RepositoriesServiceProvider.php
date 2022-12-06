<?php

namespace App\Providers;

use App\Repositories\Read\Category\CategoryReadRepository;
use App\Repositories\Read\Category\CategoryReadRepositoryInterface;
use App\Repositories\Read\Media\MediaReadRepository;
use App\Repositories\Read\Media\MediaReadRepositoryInterface;
use App\Repositories\Read\Options\OptionsReadRepository;
use App\Repositories\Read\Options\OptionsReadRepositoryInterface;
use App\Repositories\Read\Product\ProductReadRepository;
use App\Repositories\Read\Product\ProductReadRepositoryInterface;
use App\Repositories\Read\Rate\RateReadRepository;
use App\Repositories\Read\Rate\RateReadRepositoryInterface;
use App\Repositories\Read\ShopCart\ShopCartReadRepository;
use App\Repositories\Read\ShopCart\ShopCartReadRepositoryInterface;
use App\Repositories\Read\User\UserReadRepository;
use App\Repositories\Read\User\UserReadRepositoryInterface;
use App\Repositories\Write\Category\CategoryWriteRepository;
use App\Repositories\Write\Category\CategoryWriteRepositoryInterface;
use App\Repositories\Write\Media\MediaWriteRepository;
use App\Repositories\Write\Media\MediaWriteRepositoryInterface;
use App\Repositories\Write\Options\OptionsWriteRepository;
use App\Repositories\Write\Options\OptionsWriteRepositoryInterface;
use App\Repositories\Write\Product\ProductWriteRepository;
use App\Repositories\Write\Product\ProductWriteRepositoryInterface;
use App\Repositories\Write\Rate\RateWriteRepository;
use App\Repositories\Write\Rate\RateWriteRepositoryInterface;
use App\Repositories\Write\ShopCart\ShopCartWriteRepository;
use App\Repositories\Write\ShopCart\ShopCartWriteRepositoryInterface;
use App\Repositories\Write\User\UserWriteRepository;
use App\Repositories\Write\User\UserWriteRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            UserWriteRepositoryInterface::class,
            UserWriteRepository::class
        );
        $this->app->bind(
            UserReadRepositoryInterface::class,
            UserReadRepository::class
        );
        $this->app->bind(
            ProductReadRepositoryInterface::class,
            ProductReadRepository::class
        );
        $this->app->bind(
            ProductWriteRepositoryInterface::class,
            ProductWriteRepository::class
        );
        $this->app->bind(
            CategoryWriteRepositoryInterface::class,
            CategoryWriteRepository::class
        );
        $this->app->bind(
            CategoryReadRepositoryInterface::class,
            CategoryReadRepository::class
        );
        $this->app->bind(
            OptionsWriteRepositoryInterface::class,
            OptionsWriteRepository::class
        );
        $this->app->bind(
            OptionsReadRepositoryInterface::class,
            OptionsReadRepository::class
        );
        $this->app->bind(
            MediaWriteRepositoryInterface::class,
            MediaWriteRepository::class
        );
        $this->app->bind(
            MediaReadRepositoryInterface::class,
            MediaReadRepository::class
        );
        $this->app->bind(
            RateReadRepositoryInterface::class,
            RateReadRepository::class
        );
        $this->app->bind(
            RateWriteRepositoryInterface::class,
            RateWriteRepository::class
        );
        $this->app->bind(
            ShopCartReadRepositoryInterface::class,
            ShopCartReadRepository::class
        );
        $this->app->bind(
            ShopCartWriteRepositoryInterface::class,
            ShopCartWriteRepository::class
        );
    }
}
