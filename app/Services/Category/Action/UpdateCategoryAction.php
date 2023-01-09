<?php

namespace App\Services\Category\Action;

use App\Http\Resources\V1\Category\CategoryResource;
use App\Models\Category\Category;
use App\Repositories\Read\Category\CategoryReadRepositoryInterface;
use App\Repositories\Write\Category\CategoryWriteRepositoryInterface;
use App\Services\Category\Dto\UpdateCategoryDto;
use App\Services\Media\UseCase\UploadMediaUseCase;

class UpdateCategoryAction
{
    public function __construct(
        protected CategoryReadRepositoryInterface $categoryReadRepository,
        protected CategoryWriteRepositoryInterface $categoryWriteRepository,
        protected UploadMediaUseCase $uploadMediaUseCase
    )
    {}
    public function run(UpdateCategoryDto $dto): CategoryResource
    {
        try{
            $category = $this->categoryReadRepository->getById($dto->id, ['children']);
            $category->updateCategory($dto);
            $this->categoryWriteRepository->save($category);

            if($dto->categoryDto->fileName && $dto->categoryDto->filePath) {
                $media = $this->uploadMediaUseCase->run($dto->categoryDto->userId, $dto->categoryDto->filePath, $dto->categoryDto->fileName, $dto->categoryDto->name);
                $this->categoryWriteRepository->syncRelations($category, [$media->id]);
            }

            $subCategories = $dto->categoryDto->subCategories;

            foreach ($subCategories as $subCategory) {
                $this->updateSubCategories($subCategory);
            }

        } catch (\Throwable $exception) {
            throw $exception;
        }

        return new CategoryResource($category);
    }

    private function updateSubCategories($subCategory): void
    {
        $category = $this->categoryReadRepository->getById($subCategory->id, []);
        $category->updateCategory($subCategory);
        $category = $this->categoryWriteRepository->save($category);

        if($subCategory->fileName && $subCategory->filePath) {
            dd("guhjnimkl;'");
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
