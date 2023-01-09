<?php

namespace App\Providers;

use Laravel\Scout\Console\DeleteAllIndexesCommand;
use Laravel\Scout\Console\DeleteIndexCommand;
use Laravel\Scout\Console\FlushCommand;
use Laravel\Scout\Console\ImportCommand;
use Laravel\Scout\Console\IndexCommand;
use Laravel\Scout\Console\SyncIndexSettingsCommand;
use Laravel\Scout\ScoutServiceProvider;

class ScoutProvider extends ScoutServiceProvider
{
    public function boot()
    {
        $this->commands([
            FlushCommand::class,
            ImportCommand::class,
            IndexCommand::class,
            SyncIndexSettingsCommand::class,
            DeleteIndexCommand::class,
            DeleteAllIndexesCommand::class,
        ]);

        $this->publishes([
            __DIR__.'/../config/scout.php' => $this->app['path.config'].DIRECTORY_SEPARATOR.'scout.php',
        ]);
    }
}
