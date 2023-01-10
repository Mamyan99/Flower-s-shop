<?php

namespace App\Repositories\Read\ShopCart;

use App\Exceptions\ShopCartDoesNotExistExecption;
use App\Models\ShopCart\ShopCart;
use App\Services\Order\Dto\CreateOrderDto;
use App\Services\ShopCart\Dto\CreateShopCartDto;
use App\Services\ShopCart\Dto\IndexShopCartDto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ShopCartReadRepository implements ShopCartReadRepositoryInterface
{
    public function index(IndexShopCartDto $dto): Collection
    {
        $shopCarts = $this->query()
            ->where('costumer_uniq_key', $dto->costumerUniqKey)
            ->with('product')
            ->get();

        if (is_null($shopCarts)) {
            throw new ShopCartDoesNotExistExecption();
        }

        return $shopCarts;
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

    public function getShopCarts(CreateOrderDto $dto, array $relations = []): Collection|array
    {
        $shopCarts = $this->query()
            ->whereIn('id', $dto->orderDto->shopCartIds)
            ->where('costumer_uniq_key', $dto->orderDto->costumerUniqKey)
            ->with($relations)
            ->get();

        if ($shopCarts->isEmpty()) {
            throw new ShopCartDoesNotExistExecption();
        }

        return $shopCarts;
    }

    private function query(): Builder
    {
        return ShopCart::query();
    }
}
