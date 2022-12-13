<?php

namespace App\Listener;

use App\Events\GetWebHookEvent;
use App\Repositories\Read\Product\ProductReadRepositoryInterface;
use App\Repositories\Read\ShopCart\ShopCartReadRepositoryInterface;
use App\Repositories\Write\Product\ProductWriteRepositoryInterface;

class ChangeProductBoughtCountListener
{
    public function __construct(
        protected ShopCartReadRepositoryInterface $shopCartReadRepository,
        protected ProductWriteRepositoryInterface $productWriteRepository
    )
    {}

    public function handle(GetWebHookEvent $event): void
    {
        $this->productWriteRepository->addBoughtCount($event->costumerUniqKey, $event->productIds);
    }
}
