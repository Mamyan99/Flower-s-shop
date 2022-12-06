<?php

namespace App\Services\ShopCart\Dto;

use App\Http\Requests\V1\ShopCart\DeleteShopCartRequest;
use Spatie\DataTransferObject\DataTransferObject;

class DeleteShopCartDto extends DataTransferObject
{
    public array $ids;
    public string $costumer_uniq_key;

    public static function fromRequest(DeleteShopCartRequest $request): self
    {
        return new self(
            ids: $request->getIdS(),
            costumerUniqKey: $request->getCostumerUniqKey(),
        );
    }
}
