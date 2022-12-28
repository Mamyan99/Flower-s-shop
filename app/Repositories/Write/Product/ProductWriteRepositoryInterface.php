<?php

namespace App\Repositories\Write\Product;

use App\Models\Product\Product;

interface ProductWriteRepositoryInterface
{
public function save(Product $product): Product;
public function syncRelations(Product $product, array $categoriesIds, array $colorsIds, array $sizes, array $mediaIds): void;
public function delete(array $ids): bool;
public function addBoughtCount(string $costumerUniqKey, array $productIds);
}
