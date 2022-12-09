<?php

namespace App\Services\Order\Action;

use App\Http\Resources\V1\OrderResource\OrderResource;
use App\Models\Order\Order;
use App\Repositories\Read\Order\OrderReadRepositoryInterface;
use App\Repositories\Write\Order\OrderWriteRepositoryInterface;
use App\Services\Order\Dto\CreateOrderDto;

class CreateOrderAction
{
    public function __construct(
        protected OrderReadRepositoryInterface $orderReadRepository,
        protected OrderWriteRepositoryInterface $orderWriteRepository
    )
    {}

    public function run(CreateOrderDto $dto): OrderResource
    {
        //$order = Order::create($dto);

    }
}
