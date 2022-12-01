<?php

namespace App\Services\Options\Dto;

use App\Http\Requests\V1\Options\BaseOptionsRequest;
use Spatie\DataTransferObject\DataTransferObject;

class OptionsDto extends DataTransferObject
{
    public string $name;
    public string $value;
    public string $type;

    public static function fromRequest(BaseOptionsRequest $request): self
    {
        return new self(
            name: $request->getName(),
            value: $request->getValue(),
            type: $request->getType()
        );
    }
}
