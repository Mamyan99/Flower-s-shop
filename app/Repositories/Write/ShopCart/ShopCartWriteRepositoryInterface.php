<?php

namespace App\Repositories\Write\ShopCart;

use App\Models\ShopCart\ShopCart;

interface ShopCartWriteRepositoryInterface
{
    public function save(ShopCart $shopCart): ShopCart;
    public function delete(array $ids): bool;
}
