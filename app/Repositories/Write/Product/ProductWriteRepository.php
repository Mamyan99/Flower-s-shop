<?php

namespace App\Repositories\Write\Product;

use App\Exceptions\DeleteErrorException;
use App\Exceptions\SavingErrorException;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductWriteRepository implements ProductWriteRepositoryInterface
{
    public function  save(Product $product): Product
    {
        if (!$product->save())
        {
            throw new SavingErrorException();
        }

        return $product;
    }

    public function syncRelations(Product $product, array $categoriesIds, array $optionsIds, array $mediaIds): void
    {
        $product->category()->sync($categoriesIds);
        $product->option()->sync($optionsIds);
        $product->media()->sync($mediaIds);
    }

    public function delete(array $ids): bool
    {
        $query = $this->query();

        if(!$query->whereIn('id', $ids)->delete())
        {
            throw new DeleteErrorException;
        }

        return true;
    }

    public function addBoughtCount(string $costumerUniqKey, array $productIds)
    {
           $this->query()
                ->whereIn('id', $productIds)
                ->where('costumer_uniq_key', $costumerUniqKey)
                ->increment('bought_products_count');
    }

    private function query(): Builder
    {
        return Product::query();
    }
}
