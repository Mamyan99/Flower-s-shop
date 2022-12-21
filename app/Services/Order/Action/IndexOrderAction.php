<?php

namespace App\Services\Order\Action;


use App\Http\Resources\V1\Order\OrderResource;
use App\Repositories\Read\Order\OrderReadRepositoryInterface;
use App\Services\Order\Dto\IndexOrderDto;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexOrderAction
{
    public function __construct(protected OrderReadRepositoryInterface $orderReadRepository)
    {}
    public function run(IndexOrderDto $dto): AnonymousResourceCollection
    {
        $orders = $this->orderReadRepository->index($dto);

        return OrderResource::collection($orders);
    }
}
