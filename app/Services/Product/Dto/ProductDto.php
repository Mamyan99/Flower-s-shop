<?php

namespace App\Services\Product\Dto;

use App\Http\Requests\V1\Product\BaseProductRequest;
use Spatie\DataTransferObject\DataTransferObject;

class ProductDto extends DataTransferObject
{
    public string $name;
    public array $mediaIds;
    public ?string $shortDescription;
    public ?string $description;
    public ?float $price;
    public ?string $currency;
    public int $availableCount;
    public array $categoriesIds;
    public array $optionsIds;

    public static function fromRequest(BaseProductRequest $request): self
    {
        return new self(
            name: $request->getName(),
            mediaIds: $request->getMediaIds(),
            shortDescription: $request->getShortDescription(),
            description: $request->getDescription(),
            price: $request->getPrice(),
            currency: $request->getCurrency(),
            availableCount: $request->getAvailableCount(),
            categoriesIds: $request->getCategoriesIds(),
            optionsIds: $request->getOptionsIds()
        );
    }
}
