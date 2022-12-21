<?php

namespace App\Repositories\Read\ShopCart;

use App\Models\ShopCart\ShopCart;
use App\Services\Order\Dto\CreateOrderDto;
use App\Services\ShopCart\Dto\CreateShopCartDto;
use App\Services\ShopCart\Dto\IndexShopCartDto;
use Illuminate\Database\Eloquent\Collection;

interface ShopCartReadRepositoryInterface
{
    public function index(IndexShopCartDto $dto): Collection;
    public function getShopCart(CreateShopCartDto $dto): ShopCart;
    public function getById(string $shopCartId, array $relations = []): ShopCart;
    public function getShopCarts(CreateOrderDto $dto, array $relations = []):  Collection|array;
}
