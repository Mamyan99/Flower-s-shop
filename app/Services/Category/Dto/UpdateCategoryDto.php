<?php

namespace App\Services\Category\Dto;

use App\Http\Requests\V1\Category\UpdateCategoryRequest;
use Spatie\DataTransferObject\DataTransferObject;

class UpdateCategoryDto extends DataTransferObject
{
    public string $id;
    public CategoryDto $categoryDto;

    public static function fromRequest(UpdateCategoryRequest $request): self
    {
        return new self(
            id: $request->getId(),
            categoryDto: CategoryDto::fromRequest($request)
        );
    }
}
