<?php

namespace App\Repositories\Read\ShopCart;

use App\Exceptions\ShopCartDoesNotExistExecption;
use App\Models\ShopCart\ShopCart;
use App\Services\ShopCart\Dto\CreateShopCartDto;
use App\Services\ShopCart\Dto\IndexShopCartDto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ShopCartReadRepository implements ShopCartReadRepositoryInterface
{
    public function index(IndexShopCartDto $dto): Collection
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

    public function getShopCart(CreateShopCartDto $dto, array $relations = []): ShopCart
    {
        $shopCart = $this->query()
            ->where('product_id', $dto->productId)
            ->where('costumer_uniq_key', $dto->costumerUniqKey)
            ->where('bought', false)
            ->first();

        if (is_null($shopCart)) {
            throw new ShopCartDoesNotExistExecption();
        }

        return $shopCart;
    }

    public function getById(string $shopCartId, array $relations = []): ShopCart
    {
        $shopCart = $this->query()
            ->where('id', $shopCartId)
            ->with($relations)
            ->first();

        if (is_null($shopCart)) {
            throw new ShopCartDoesNotExistExecption();
        }

        return $shopCart;
    }

    public function getShopCartByCostumerUniqKey(string $costumerUniqKey, array $productIds): ShopCart
    {
        $shopCart = $this->query()
            ->whereIn('product_id', $productIds)
            ->where('costumer_uniq_key', $costumerUniqKey)
            ->first();

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
