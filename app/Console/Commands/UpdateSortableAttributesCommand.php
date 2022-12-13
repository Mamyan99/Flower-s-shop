<?php

namespace App\Console\Commands;

use App\Services\Product\UseCase\GetSortingAttributesUseCase;
use Illuminate\Console\Command;

class UpdateSortableAttributesCommand extends Command
{
    protected $signature = 'sorts:update';
    protected $description = 'Command description';

    public function handle(GetSortingAttributesUseCase $getSortingAttributesUseCase)
    {
        $getSortingAttributesUseCase->run();

        return Command::SUCCESS;
    }
}
