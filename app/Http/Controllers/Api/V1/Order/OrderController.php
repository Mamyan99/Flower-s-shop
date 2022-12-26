<?php

namespace App\Http\Controllers\Api\V1\Order;

use App\Http\Controllers\Api\V1\Controller;
use App\Http\Requests\V1\Order\CreateOrderRequest;
use App\Http\Requests\V1\Order\DeleteOrderRequest;
use App\Http\Requests\V1\Order\IndexOrderRequest;
use App\Http\Requests\V1\Order\UpdateOrderRequest;
use App\Http\Resources\V1\Order\OrderResource;
use App\Services\Order\Action\CreateOrderAction;
use App\Services\Order\Action\DeleteOrderAction;
use App\Services\Order\Action\IndexOrderAction;
use App\Services\Order\Action\UpdateOrderAction;
use App\Services\Order\Dto\CreateOrderDto;
use App\Services\Order\Dto\IndexOrderDto;
use App\Services\Order\Dto\UpdateOrderDto;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    public function __construct(
        protected CreateOrderAction $createOrderAction,
        protected DeleteOrderAction $deleteOrderAction,
        protected UpdateOrderAction $updateOrderAction,
        protected IndexOrderAction  $indexOrderAction
    ) {}

    public function index(IndexOrderRequest $request): AnonymousResourceCollection
    {
        $dto = IndexOrderDto::fromRequest($request);

        return $this->indexOrderAction->run($dto);
    }

    public function create(CreateOrderRequest $request): OrderResource
    {
        $dto = CreateOrderDto::fromRequest($request);

        return $this->createOrderAction->run($dto);
    }

    public function delete(DeleteOrderRequest $request):Response
    {
        $ids = $request->getIdS();

        $this->deleteOrderAction->run($ids);

        return response([], 204);
    }

    public function update(UpdateOrderRequest $request): OrderResource
    {
        $dto = UpdateOrderDto::fromRequest($request);

        return $this->updateOrderAction->run($dto);
    }
}
