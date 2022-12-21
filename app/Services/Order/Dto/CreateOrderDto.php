<?php

namespace App\Services\Order\Dto;

use App\Http\Requests\V1\Option\CreateOptionRequest;
use App\Http\Requests\V1\Order\CreateOrderRequest;
use App\Services\Option\Dto\OptionDto;
use Spatie\DataTransferObject\DataTransferObject;

class CreateOrderDto extends DataTransferObject
{
    public OrderDto $orderDto;

    public static function fromRequest(CreateOrderRequest $request): self
    {
        return new self(
            orderDto: OrderDto::fromRequest($request)
        );
    }
}
