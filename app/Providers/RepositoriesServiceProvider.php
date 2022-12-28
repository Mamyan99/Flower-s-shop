<?php

namespace App\Providers;

use App\Repositories\Read\Category\CategoryReadRepository;
use App\Repositories\Read\Category\CategoryReadRepositoryInterface;
use App\Repositories\Read\Media\MediaReadRepository;
use App\Repositories\Read\Media\MediaReadRepositoryInterface;
use App\Repositories\Read\Option\OptionReadRepository;
use App\Repositories\Read\Option\OptionReadRepositoryInterface;
use App\Repositories\Read\Options\Color\ColorReadRepository;
use App\Repositories\Read\Options\Color\ColorReadRepositoryInterface;
use App\Repositories\Read\Options\Size\SizeReadRepository;
use App\Repositories\Read\Options\Size\SizeReadRepositoryInterface;
use App\Repositories\Read\Order\OrderReadRepository;
use App\Repositories\Read\Order\OrderReadRepositoryInterface;
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
use App\Repositories\Write\Option\OptionWriteRepository;
use App\Repositories\Write\Option\OptionWriteRepositoryInterface;
use App\Repositories\Write\Order\OrderWriteRepository;
use App\Repositories\Write\Order\OrderWriteRepositoryInterface;
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
            OptionWriteRepositoryInterface::class,
            OptionWriteRepository::class
        );
        $this->app->bind(
            OptionReadRepositoryInterface::class,
            OptionReadRepository::class
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
        $this->app->bind(
            OrderWriteRepositoryInterface::class,
            OrderWriteRepository::class
        );
        $this->app->bind(
            OrderReadRepositoryInterface::class,
            OrderReadRepository::class
        );
        $this->app->bind(
            OrderReadRepositoryInterface::class,
            OrderReadRepository::class
        );
        $this->app->bind(
            ColorReadRepositoryInterface::class,
            ColorReadRepository::class
        );
        $this->app->bind(
            SizeReadRepositoryInterface::class,
            SizeReadRepository::class
        );
    }
}
