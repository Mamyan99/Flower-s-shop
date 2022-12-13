<?php

namespace App\Services\Product\UseCase;

use App\Models\BaseConstants\BaseConstans;
use MeiliSearch\Client;

class GetSortingAttributesUseCase
{
    public function run(): void
    {
        $client = new Client(config('scout.meilisearch.host'));
        $client->index(BaseConstans::PRODUCTS_INDEX)->updateSortableAttributes([
            BaseConstans::BOUGHT_PRODUCTS_COUNT,
            BaseConstans::CREATED_AT,
            BaseConstans::PRICE,
        ]);

    }
}
