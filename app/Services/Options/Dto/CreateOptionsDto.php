<?php

namespace App\Services\Options\Dto;

use App\Http\Requests\V1\Options\CreateOptionsRequest;
use Spatie\DataTransferObject\DataTransferObject;

class CreateOptionsDto extends DataTransferObject
{
    public OptionsDto $optionsDto;

    public static function fromRequest(CreateOptionsRequest $request): self
    {
        return new self(
            optionsDto: OptionsDto::fromRequest($request)
        );
    }
}
