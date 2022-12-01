<?php

namespace App\Services\Category\Action;

use App\Repositories\Write\Category\CategoryWriteRepositoryInterface;

class DeleteCategoryAction
{
    public function __construct(protected CategoryWriteRepositoryInterface $categoryWriteRepository)
    {}

    public function run(array $ids): bool
    {
        return $this->categoryWriteRepository->delete($ids);
    }
}
