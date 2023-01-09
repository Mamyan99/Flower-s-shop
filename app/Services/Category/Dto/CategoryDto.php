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
    public ?string $filePath;
    public ?string $fileName;
    public ?string $userId;


    public static function fromRequest(BaseCategoryRequest $request): self
    {
        $subCategories = collect();

        foreach ($request->getSubCategories() as $category) {
            $subCategories->push(new self(
                name: $category['name'],
                shortDescription: $category['short_description'] ?? null,
                description: $category['description'] ?? null,
                filePath: isset($category['file']) ? $category['file']->getPathname() : null,
                fileName: isset($category['file']) ? $category['file']->getFileName() : null,
                userId: $request->getUserId(),
            ));
        }

        return new self(
            parentId: $request->getParentId(),
            name: $request->getName(),
            shortDescription: $request->getShortDescription(),
            description: $request->getDescription(),
            filePath: $request->getFilePath(),
            fileName: $request->getFileName(),
            userId: $request->getUserId(),
            subCategories: $subCategories
        );
    }
}
