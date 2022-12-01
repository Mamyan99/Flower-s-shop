<?php

namespace App\Services\Product\Action;

use App\Http\Resources\V1\Product\ProductResource;
use App\Models\Product\Product;
use App\Repositories\Write\Product\ProductWriteRepositoryInterface;
use App\Services\Product\Dto\ProductDto;

class CreateProductAction
{
    public function __construct(protected ProductWriteRepositoryInterface $productWriteRepository,)
    {}

    public function run(ProductDto $dto): ProductResource
    {
        $product = Product::create($dto);

        $this->productWriteRepository->save($product, $dto->categoriesIds, $dto->optionsIds, $dto->mediaIds);

        return new ProductResource($product);
    }
}
