<?php

namespace App\Services\Category\Action;

use App\Http\Resources\V1\Category\CategoryResource;
use App\Models\Category\Category;
use App\Repositories\Write\Category\CategoryWriteRepositoryInterface;
use App\Services\Category\Dto\CreateCategoryDto;
use App\Services\Media\UseCase\UploadMediaUseCase;

class CreateCategoryAction
{
    public function __construct(
        protected CategoryWriteRepositoryInterface $categoryWriteRepository,
        protected UploadMediaUseCase $uploadMediaUseCase,
    )
    {}
    public function run(CreateCategoryDto $dto): CategoryResource
    {
        $category = Category::create($dto->categoryDto);
        $category = $this->categoryWriteRepository->save($category);

        if($dto->categoryDto->fileName && $dto->categoryDto->filePath) {
           $media = $this->uploadMediaUseCase->run($dto->categoryDto->userId, $dto->categoryDto->filePath, $dto->categoryDto->fileName, $dto->categoryDto->name);
           $this->categoryWriteRepository->syncRelations($category, [$media->id]);
        }

        $subCategories = $dto->categoryDto->subCategories;
        $categoryId = $category->id;

        foreach ($subCategories as $subCategory) {
            $this->createSubCategories($categoryId, $subCategory);
        }

        return new CategoryResource($category);
    }

    private function createSubCategories(string $categoryId, $subCategory): void
    {
        $category = Category::create($subCategory);
        $category->parent_id = $categoryId;
        $category = $this->categoryWriteRepository->save($category);

        if($subCategory->fileName && $subCategory->filePath) {
            $media = $this->uploadMediaUseCase->run(
                $subCategory->userId,
                $subCategory->filePath,
                $subCategory->fileName,
                $subCategory->name
            );
            $this->categoryWriteRepository->syncRelations($category, [$media->id]);
        }
    }
}
