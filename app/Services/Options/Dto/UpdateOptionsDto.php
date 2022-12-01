<?php

namespace App\Services\Options\Dto;

use App\Http\Requests\V1\Options\UpdateOptionsRequest;
use Spatie\DataTransferObject\DataTransferObject;

class UpdateOptionsDto extends DataTransferObject
{
    public string $id;
    public OptionsDto $optionsDto;

    public static function fromRequest(UpdateOptionsRequest $request): self
    {
        return new self(
            id: $request->getId(),
            optionsDto: OptionsDto::fromRequest($request)
        );
    }
}
