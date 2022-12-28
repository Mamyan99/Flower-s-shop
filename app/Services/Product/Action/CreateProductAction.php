<?php

namespace App\Services\Product\Action;

use App\Http\Resources\V1\Product\ProductResource;
use App\Models\Product\Product;
use App\Repositories\Write\Product\ProductWriteRepositoryInterface;
use App\Services\Product\Dto\CreateProductDto;
use App\Services\Product\Dto\ProductDto;
use App\Services\Product\Transformer\CreateOrUpdateSizesTransformer;

class CreateProductAction
{
    public function __construct(
        protected ProductWriteRepositoryInterface $productWriteRepository,
        protected CreateOrUpdateSizesTransformer $createOrUpdateSizesTransformer
    )
    {}

    public function run(CreateProductDto $dto): ProductResource
    {
        $product = Product::create($dto);
        $this->productWriteRepository->save($product);
        $sizes = $this->createOrUpdateSizesTransformer->transformer($dto->productDto->sizes);
        $this->productWriteRepository->syncRelations(
            $product,
            $dto->productDto->categoriesIds,
            $dto->productDto->colorsIds,
            $sizes,
            $dto->productDto->mediaIds
        );

        return new ProductResource($product);
    }
}
