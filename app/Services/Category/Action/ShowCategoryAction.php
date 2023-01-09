<?php

namespace App\Services\Category\Action;

use App\Http\Resources\V1\Category\CategoryResource;
use App\Repositories\Read\Category\CategoryReadRepositoryInterface;
use App\Services\Category\Dto\IndexCategoryDto;
use App\Services\Category\Dto\ShowCategoryDto;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ShowCategoryAction
{
    public function __construct(protected CategoryReadRepositoryInterface $categoryReadRepository)
    {}
    public function run(ShowCategoryDto $dto): CategoryResource
    {
        $category = $this->categoryReadRepository->getById($dto->id, ['children']);

         return new CategoryResource($category);
    }
}
