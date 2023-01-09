<?php

namespace App\Listeners;

use App\Events\ImportProductsToIndexEvent;
use App\Models\Product\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Artisan;

class ImportProductsToIndexListener
{
    public function handle(ImportProductsToIndexEvent $event)
    {
        Artisan::call('scout:import', ['model' => Product::class]);
        Artisan::call('sorts:update');
    }
}
