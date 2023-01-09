<?php

namespace App\Repositories\Read\ProductSize;

use Illuminate\Database\Eloquent\Collection;

interface ProductSizeReadRepositoryInterface
{
    public function sortPrice(string $sort): Collection;
}
