<?php

namespace App\Listener;

use App\Events\GetWebHookEvent;
use App\Repositories\Read\ShopCart\ShopCartReadRepositoryInterface;
use App\Repositories\Write\ShopCart\ShopCartWriteRepositoryInterface;

class ChangeShopCartBoughtListener
{
    public function __construct(
        protected ShopCartWriteRepositoryInterface $shopCartWriteRepository,
        protected ShopCartReadRepositoryInterface $shopCartReadRepository
    )
    {}

    public function handle(GetWebHookEvent $event): void
    {
        $shopCart = $this->shopCartReadRepository->getShopCartByCostumerUniqKey($event->costumerUniqKey,$event->productIds);
        $shopCart->updateBought(true);
        $this->shopCartWriteRepository->save($shopCart);
    }
}
