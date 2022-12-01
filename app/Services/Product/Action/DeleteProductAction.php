<?php

namespace App\Services\Product\Action;

use App\Repositories\Write\Product\ProductWriteRepositoryInterface;

class DeleteProductAction
{
    public function __construct(protected ProductWriteRepositoryInterface $productWriteRepository)
    {}

    public function run(array $ids): bool
    {
        return $this->productWriteRepository->delete($ids);
    }
}
