<?php

namespace App\Services\ShopCart\Dto;

use App\Http\Requests\V1\ShopCart\IndexShopCartRequest;
use App\Services\QueryList\QueryListDto;
use Spatie\DataTransferObject\DataTransferObject;

class IndexShopCartDto extends DataTransferObject
{
    public string $costumerUniqKey;
    public QueryListDto $queryListDto;

    public static function fromRequest(IndexShopCartRequest $request): self
    {
        return new self(
            costumerUniqKey: $request->getCostumerUniqKey(),
            queryListDto: QueryListDto::fromRequest($request)
        );
    }
}

