<?php

namespace App\Services\Product\Action;

use App\Http\Resources\V1\Product\ProductResource;
use App\Repositories\Read\Product\ProductReadRepositoryInterface;
use App\Repositories\Write\Product\ProductWriteRepositoryInterface;
use App\Services\Product\Dto\UpdateProductDto;

class UpdateProductAction
{
    public function __construct(
        protected ProductReadRepositoryInterface $productReadRepository,
        protected ProductWriteRepositoryInterface $productWriteRepository
    )
    {}
    public function run(UpdateProductDto $dto): ProductResource
    {
            $product = $this->productReadRepository->getById($dto->id);
            $product->updateProduct($dto);
            $this->productWriteRepository->save($product);

        return new ProductResource($product);
    }
}
