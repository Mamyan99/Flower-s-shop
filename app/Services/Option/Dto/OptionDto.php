<?php

namespace App\Services\Option\Dto;

use App\Http\Requests\V1\Option\BaseOptionRequest;
use Spatie\DataTransferObject\DataTransferObject;

class OptionDto extends DataTransferObject
{
    public string $name;
    public string $value;
    public string $type;

    public static function fromRequest(BaseOptionRequest $request): self
    {
        return new self(
            name: $request->getName(),
            value: $request->getValue(),
            type: $request->getType()
        );
    }
}
