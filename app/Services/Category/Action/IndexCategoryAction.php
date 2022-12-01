<?php

namespace App\Services\Category\Action;

use App\Http\Resources\V1\Category\CategoryResource;
use App\Repositories\Read\Category\CategoryReadRepositoryInterface;
use App\Services\Category\Dto\IndexCategoryDto;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexCategoryAction
{
    public function __construct(protected CategoryReadRepositoryInterface $categoryReadRepository)
    {}
    public function run(IndexCategoryDto $dto): AnonymousResourceCollection
    {
        $categories = $this->categoryReadRepository->index($dto);

         return CategoryResource::collection($categories);
    }
}
