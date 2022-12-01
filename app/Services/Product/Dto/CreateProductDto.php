<?php

namespace App\Services\Product\Dto;

use App\Http\Requests\V1\Product\CreateProductRequest;
use Spatie\DataTransferObject\DataTransferObject;

class CreateProductDto extends DataTransferObject
{
    public ProductDto $productDto;

    public static function fromRequest(CreateProductRequest $request): self
    {
        return new self(
            productDto: ProductDto::fromRequest($request)
        );
    }
}
