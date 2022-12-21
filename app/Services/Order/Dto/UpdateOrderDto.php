<?php

namespace App\Services\Order\Dto;

use App\Http\Requests\V1\Order\UpdateOrderRequest;
use Spatie\DataTransferObject\DataTransferObject;

class UpdateOrderDto extends DataTransferObject
{
    public string $id;
    public string $status;
    public OrderDto $orderDto;

    public static function fromRequest(UpdateOrderRequest $request): self
    {
        return new self(
            id: $request->getId(),
            status: $request->getStatus(),
            orderDto: OrderDto::fromRequest($request)
        );
    }
}
