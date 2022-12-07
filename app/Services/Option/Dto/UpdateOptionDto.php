<?php

namespace App\Services\Option\Dto;

use App\Http\Requests\V1\Option\UpdateOptionRequest;
use Spatie\DataTransferObject\DataTransferObject;

class UpdateOptionDto extends DataTransferObject
{
    public string $id;
    public OptionDto $optionDto;

    public static function fromRequest(UpdateOptionRequest $request): self
    {
        return new self(
            id: $request->getId(),
            optionDto: OptionDto::fromRequest($request)
        );
    }
}
