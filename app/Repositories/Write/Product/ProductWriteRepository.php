<?php

namespace App\Repositories\Write\Product;

use App\Exceptions\DeleteErrorException;
use App\Exceptions\SavingErrorException;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductWriteRepository implements ProductWriteRepositoryInterface
{
    public function  save(Product $product, array $categoriesIds, array $optionsIds, array $mediaIds): Product
    {
        if (!$product->save())
        {
            throw new SavingErrorException();
        }

        $product->category()->sync($categoriesIds);
        $product->options()->sync($optionsIds);
        $product->media()->sync($mediaIds);

        return $product;
    }

    public function delete(array $ids): bool
    {
        $query = $this->query();

        if(!$query->where('id', $ids)->delete())
        {
            throw new DeleteErrorException;
        }

        return true;
    }

    private function query(): Builder
    {
        return Product::query();
    }
}
