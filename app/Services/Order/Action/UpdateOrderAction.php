<?php

namespace App\Services\Order\Action;


use App\Http\Resources\V1\Order\OrderResource;
use App\Repositories\Read\Order\OrderReadRepositoryInterface;
use App\Repositories\Write\Order\OrderWriteRepositoryInterface;
use App\Services\Order\Dto\UpdateOrderDto;

class UpdateOrderAction
{
    public function __construct(
        protected OrderReadRepositoryInterface $orderReadRepository,
        protected OrderWriteRepositoryInterface $orderWriteRepository
    )
    {}
    public function run(UpdateOrderDto $dto): OrderResource
    {
        try{
            $order = $this->orderReadRepository->getById($dto->id);
            $order->updateOrder($dto);
            $this->orderWriteRepository->save($order);

        } catch (\Throwable $exception) {
            throw $exception;
        }

        return new OrderResource($order);
    }
}
