<?php

namespace App\Repositories\Read\ShopCart;

use App\Services\ShopCart\Dto\IndexShopCartDto;

interface ShopCartReadRepositoryInterface
{
    public function index(IndexShopCartDto $dto);
}
