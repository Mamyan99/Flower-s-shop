<?php

namespace App\Services\Category\Dto;

use App\Http\Requests\V1\Category\ShowCategoryRequest;
use Spatie\DataTransferObject\DataTransferObject;

class ShowCategoryDto extends DataTransferObject
{
    public string $id;

    public static function fromRequest(ShowCategoryRequest $request): self
    {
        return new self(
            id: $request->getId()
        );
    }
}
