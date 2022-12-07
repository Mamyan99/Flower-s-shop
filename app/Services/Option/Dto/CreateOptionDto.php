<?php

namespace App\Services\Option\Dto;

use App\Http\Requests\V1\Option\CreateOptionRequest;
use Spatie\DataTransferObject\DataTransferObject;

class CreateOptionDto extends DataTransferObject
{
    public OptionDto $optionDto;

    public static function fromRequest(CreateOptionRequest $request): self
    {
        return new self(
            optionDto: OptionDto::fromRequest($request)
        );
    }
}
