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
        try{
            $category = $this->categoryReadRepository->getById($dto->id, ['product']);
            $category->updateCategory($dto);
            $this->categoryWriteRepository->save($category);

        } catch (\Throwable $exception) {
            throw $exception;
        }

        return new CategoryResource($category);
    }
}
