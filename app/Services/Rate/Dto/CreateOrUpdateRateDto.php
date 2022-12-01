<?php

namespace App\Services\Rate\Dto;

use App\Http\Requests\V1\Rate\CreateOrUpdateRateRequest;
use Spatie\DataTransferObject\DataTransferObject;

class CreateOrUpdateRateDto extends DataTransferObject
{
    public string $productId;
    public string $costumerUniqKey;
    public float $value;

    public static function fromRequest(CreateOrUpdateRateRequest $request): self
    {
        return new self(
            productId: $request->getProductId(),
            costumerUniqKey: $request->getCostumerUniqKey(),
            value: $request->getValue(),
        );
    }
}
