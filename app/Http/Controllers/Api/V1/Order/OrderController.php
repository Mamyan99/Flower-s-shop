<?php

namespace App\Http\Controllers\Api\V1\Order;

use App\Http\Controllers\Api\V1\Controller;
use App\Http\Requests\V1\Order\CreateOrderRequest;
use App\Http\Resources\V1\OrderResource\OrderResource;
use App\Services\Order\Action\CreateOrderAction;
use App\Services\Order\Dto\CreateOrderDto;

class OrderController extends Controller
{
    public function __construct(
        protected CreateOrderAction $createOrderAction,
//        protected DeleteOrderAction $deleteOrderAction,
//        protected UpdateOrderAction $updateOrderAction,
//        protected IndexOrderAction  $indexOrderAction
    ) {}
    public function create(CreateOrderRequest $request): OrderResource
    {
        $dto = CreateOrderDto::fromRequest($request);

        return $this->createOrderAction->run($dto);
    }
}
