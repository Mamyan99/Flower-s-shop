<?php

namespace App\Services\Category\Dto;

use App\Http\Requests\V1\Category\BaseCategoryRequest;
use Spatie\DataTransferObject\DataTransferObject;

class CategoryDto extends DataTransferObject
{
    public ?string $parentId;
    public string $name;
    public ?string $shortDescription;
    public ?string $description;

    public static function fromRequest(BaseCategoryRequest $request): self
    {
        return new self(
            parentId: $request->getParentId(),
            name: $request->getName(),
            shortDescription: $request->getShortDescription(),
            description: $request->getDescription()
        );
    }
}
