<?php

namespace App\Services\Category\Action;

use App\Http\Resources\V1\Category\CategoryResource;
use App\Models\Category\Category;
use App\Models\Helpers\Uuid;
use App\Repositories\Write\Category\CategoryWriteRepositoryInterface;
use App\Services\Category\Dto\CategoryDto;

class CreateCategoryAction
{
    public function __construct(protected CategoryWriteRepositoryInterface $categoryWriteRepository)
    {}
    public function run(CategoryDto $dto): CategoryResource
    {
        $category = Category::create($dto);
        $category = $this->categoryWriteRepository->save($category);
        $subCategories = $dto->subCategories;
        $subCategoriesArray = [];

        foreach ($subCategories as $subCategory) {
            $sub = [
                'id' => Uuid::generate(),
                'parent_id' => $category->id,
                'name'=> $subCategory->name,
                'short_description' => $subCategory->shortDescription,
                'description' => $subCategory->description
            ];

            $subCategoriesArray[] = $sub;
        }
        //dd($subCategoriesArray);
        $this->categoryWriteRepository->insertSubCategories($subCategoriesArray);

        return new CategoryResource($category);
    }
}
