<?php

namespace App\Services\Order\Dto;

use App\Http\Requests\V1\Order\IndexOrderRequest;
use App\Http\Requests\V1\ShopCart\IndexShopCartRequest;
use App\Services\QueryList\QueryListDto;
use Spatie\DataTransferObject\DataTransferObject;

class IndexOrderDto extends DataTransferObject
{
    public string $costumerUniqKey;
    public ?string $filterValue;
    public QueryListDto $queryListDto;

    public static function fromRequest(IndexOrderRequest $request): self
    {
        return new self(
            costumerUniqKey: $request->getCostumerUniqKey(),
            filterValue: $request->getFilterValue(),
            queryListDto: QueryListDto::fromRequest($request)
        );
    }
}

