<?php

namespace App\Repositories\Read\ProductSize;

use App\Models\ProductSize\ProductSize;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ProductSizeReadRepository implements ProductSizeReadRepositoryInterface
{
    public function sortPrice(string $sort): Collection
    {
        return ProductSize::query()->orderBy('price', $sort)->get();
    }
}
