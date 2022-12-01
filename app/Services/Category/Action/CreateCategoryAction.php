<?php

namespace App\Services\Category\Action;

use App\Http\Resources\V1\Category\CategoryResource;
use App\Models\Category\Category;
use App\Repositories\Write\Category\CategoryWriteRepositoryInterface;
use App\Services\Category\Dto\CategoryDto;

class CreateCategoryAction
{
    public function __construct(protected CategoryWriteRepositoryInterface $categoryWriteRepository)
    {}
    public function run(CategoryDto $dto): CategoryResource
    {
        $category = Category::create($dto);
        $this->categoryWriteRepository->save($category);

        return new CategoryResource($category);
    }
}
