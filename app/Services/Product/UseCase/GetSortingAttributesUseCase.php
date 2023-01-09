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
            BaseConstans::SIZE,
        ]);

        $client->index(BaseConstans::CATEGORIES_INDEX)->updateSortableAttributes([
            BaseConstans::CREATED_AT,
        ]);

        $client->index('product_size_index')->updateSortableAttributes([
            BaseConstans::PRICE,
        ]);

        $client->index('products_index')->updateSearchableAttributes([
            'name',
            'short_description',
            'description',
            'category',
            'color',
            'size',
        ]);

        $client->createIndex('product_size_index', ['primaryKey' => 'id']);
    }
}
