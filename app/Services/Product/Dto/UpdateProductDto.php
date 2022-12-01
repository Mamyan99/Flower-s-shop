<?php

namespace App\Services\Product\Dto;

use App\Http\Requests\V1\Product\UpdateProductRequest;
use Spatie\DataTransferObject\DataTransferObject;

class UpdateProductDto extends DataTransferObject
{
    public string $id;
    public ProductDto $productDto;

    public static function fromRequest(UpdateProductRequest $request): self
    {
        return new self(
            id: $request->getId(),
            productDto: ProductDto::fromRequest($request)
        );
    }
}
