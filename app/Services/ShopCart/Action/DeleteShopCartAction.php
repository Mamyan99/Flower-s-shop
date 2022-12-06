<?php

namespace App\Services\ShopCart\Action;

use App\Repositories\Write\ShopCart\ShopCartWriteRepositoryInterface;

class DeleteShopCartAction
{
    public function __construct(protected ShopCartWriteRepositoryInterface $shopCartWriteRepository)
    {}

    public function run(array $ids): bool
    {
        return $this->shopCartWriteRepository->delete($ids);
    }
}
