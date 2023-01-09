<?php

namespace App\Services\Category\Action;

use App\Http\Resources\V1\Category\CategoryResource;
use App\Repositories\Read\Category\CategoryReadRepositoryInterface;
use App\Repositories\Write\Category\CategoryWriteRepositoryInterface;
use App\Services\Category\Dto\UpdateCategoryDto;

class UpdateCategoryAction
{
    public function __construct(
        protected CategoryReadRepositoryInterface $categoryReadRepository,
        protected CategoryWriteRepositoryInterface $categoryWriteRepository
    )
    {}
    public function run(UpdateCategoryDto $dto): CategoryResource
    {
            $category = $this->categoryReadRepository->getById($dto->id);
            $category->updateCategory($dto);
            $this->categoryWriteRepository->save($category);

        return new CategoryResource($category);
    }
}
