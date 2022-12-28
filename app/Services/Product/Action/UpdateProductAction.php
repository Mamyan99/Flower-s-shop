<?php

namespace App\Services\Product\Action;

use App\Http\Resources\V1\Product\ProductResource;
use App\Repositories\Read\Product\ProductReadRepositoryInterface;
use App\Repositories\Write\Product\ProductWriteRepositoryInterface;
use App\Services\Product\Dto\UpdateProductDto;
use App\Services\Product\Transformer\CreateOrUpdateSizesTransformer;

class UpdateProductAction
{
    public function __construct(
        protected ProductReadRepositoryInterface $productReadRepository,
        protected ProductWriteRepositoryInterface $productWriteRepository,
        protected CreateOrUpdateSizesTransformer $createOrUpdateSizesTransformer
    )
    {}
    public function run(UpdateProductDto $dto): ProductResource
    {
        $product = $this->productReadRepository->getById($dto->id);
        $product->updateProduct($dto);
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
