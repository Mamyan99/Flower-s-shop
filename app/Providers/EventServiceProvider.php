<?php

namespace App\Providers;

use App\Events\GetWebHookEvent;
use App\Events\ImportProductsToIndexEvent;
use App\Listener\ChangeOrderStatusListener;
use App\Listener\ChangeProductBoughtCountListener;
use App\Listener\ChangeShopCartBoughtListener;
use App\Listeners\ImportProductsToIndexListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        GetWebHookEvent::class => [
            ChangeShopCartBoughtListener::class,
            ChangeProductBoughtCountListener::class,
            ChangeOrderStatusListener::class,
        ],
        ImportProductsToIndexEvent::class => [
            ImportProductsToIndexListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
