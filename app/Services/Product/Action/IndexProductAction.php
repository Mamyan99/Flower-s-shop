<?php

namespace App\Services\Product\Action;

use App\Http\Resources\V1\Product\ProductResource;
use App\Repositories\Read\Product\ProductReadRepositoryInterface;
use App\Repositories\Read\ProductSize\ProductSizeReadRepositoryInterface;
use App\Services\Product\Dto\IndexProductDto;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexProductAction
{
    public function __construct(
        protected ProductReadRepositoryInterface $productReadRepository,
        protected ProductSizeReadRepositoryInterface $productSizeRepository
    )
    {}

    public function run(IndexProductDto $dto): AnonymousResourceCollection
    {
        $products = $this->productReadRepository->index($dto);

        return ProductResource::collection($products);
    }
}
