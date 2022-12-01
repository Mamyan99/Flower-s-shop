<?php

namespace App\Services\Category\Dto;

use App\Http\Requests\V1\Category\CreateCategoryRequest;
use Spatie\DataTransferObject\DataTransferObject;

class CreateCategoryDto extends DataTransferObject
{
    public CategoryDto $categoryDto;

    public static function fromRequest(CreateCategoryRequest $request): self
    {
        return new self(
            categoryDto: CategoryDto::fromRequest($request)
        );
    }
}
