<?php

namespace App\Services\ShopCart\Dto;

use App\Http\Requests\V1\ShopCart\CreateShopCartRequest;
use Spatie\DataTransferObject\DataTransferObject;

class CreateShopCartDto extends DataTransferObject
{
    public string $productId;
    public string $costumerUniqKey;
    public int $productsCount;
    public bool $bought;

    public static function fromRequest(CreateShopCartRequest $request): self
    {
        return new self(
            productId: $request->getProductId(),
            costumerUniqKey: $request->getCostumerUniqKey(),
            productsCount: $request->getProductCounts(),
            bought: $request->getBought()
        );
    }
}

