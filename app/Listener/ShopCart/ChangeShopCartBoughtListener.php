<?php

namespace App\Listener\ShopCart;

use App\Events\ShopCart\ChangeShopCartBoughtEvent;
use App\Repositories\Read\ShopCart\ShopCartReadRepositoryInterface;
use App\Repositories\Write\ShopCart\ShopCartWriteRepositoryInterface;

class ChangeShopCartBoughtListener
{
    public function __construct(
        protected ShopCartWriteRepositoryInterface $shopCartWriteRepository,
        protected ShopCartReadRepositoryInterface $shopCartReadRepository
    )
    {}

    public function handle(ChangeShopCartBoughtEvent $event): void
    {
        $shopCart = $this->shopCartReadRepository->getById($event->shopCartId);
        $shopCart->updateBought(true);
        $this->shopCartWriteRepository->save($shopCart);
    }
}
