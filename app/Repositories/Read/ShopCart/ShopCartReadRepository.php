<?php

namespace App\Repositories\Read\ShopCart;

use App\Exceptions\ShopCartDoesNotExistExecption;
use App\Models\ShopCart\ShopCart;
use App\Services\ShopCart\Dto\IndexShopCartDto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class ShopCartReadRepository implements ShopCartReadRepositoryInterface
{
    public function index(IndexShopCartDto $dto)
    {
        $shopCart = $this->query()
            ->where('costumer_uniq_key', $dto->costumerUniqKey)
            ->with('product')
            ->get();

        if (is_null($shopCart)) {
            throw new ShopCartDoesNotExistExecption();
        }

        return $shopCart;
    }

    private function query(): Builder
    {
        return ShopCart::query();
    }
}
