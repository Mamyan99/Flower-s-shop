<?php

namespace App\Listener;

use App\Events\GetWebHookEvent;
use App\Repositories\Read\Order\OrderReadRepositoryInterface;
use App\Repositories\Write\Order\OrderWriteRepositoryInterface;

class ChangeOrderStatusListener
{
    public function __construct(
        protected OrderReadRepositoryInterface $orderReadRepository,
        protected OrderWriteRepositoryInterface $orderWriteRepository
    )
    {}

    public function handle(GetWebHookEvent $event): void
    {
        $this->orderReadRepository->addBoughtCount($event->costumerUniqKey, $event->productIds);
    }
}
