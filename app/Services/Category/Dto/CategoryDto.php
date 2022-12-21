<?php

namespace App\Services\Category\Dto;

use App\Http\Requests\V1\Category\BaseCategoryRequest;
use Illuminate\Support\Collection;
use Spatie\DataTransferObject\DataTransferObject;

class CategoryDto extends DataTransferObject
{
    public ?string $parentId;
    public string $name;
    public ?string $shortDescription;
    public ?string $description;
    public ?Collection $subCategories;

    public static function fromRequest(BaseCategoryRequest $request): self
    {
        $subCategories = collect();

        foreach ($request->getSubCategories() as $category) {
            $subCategories->push(new self(
                name: $category['name'],
                shortDescription: $category['short_description'] ?? null,
                description: $category['description'] ?? null,
            ));
        }

        return new self(
            parentId: $request->getParentId(),
            name: $request->getName(),
            shortDescription: $request->getShortDescription(),
            description: $request->getDescription(),
            subCategories: $subCategories
        );
    }
}
