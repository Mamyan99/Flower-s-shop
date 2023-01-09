<?php

namespace App\Http\Controllers\Api\V1\Category;

use App\Http\Controllers\Api\V1\Controller;
use App\Http\Requests\V1\Category\CreateCategoryRequest;
use App\Http\Requests\V1\Category\DeleteCategoryRequest;
use App\Http\Requests\V1\Category\IndexCategoryRequest;
use App\Http\Requests\V1\Category\ShowCategoryRequest;
use App\Http\Requests\V1\Category\UpdateCategoryRequest;
use App\Http\Resources\V1\Category\CategoryResource;
use App\Services\Category\Action\CreateCategoryAction;
use App\Services\Category\Action\DeleteCategoryAction;
use App\Services\Category\Action\IndexCategoryAction;
use App\Services\Category\Action\ShowCategoryAction;
use App\Services\Category\Action\UpdateCategoryAction;
use App\Services\Category\Dto\CategoryDto;
use App\Services\Category\Dto\CreateCategoryDto;
use App\Services\Category\Dto\IndexCategoryDto;
use App\Services\Category\Dto\ShowCategoryDto;
use App\Services\Category\Dto\UpdateCategoryDto;
use App\Services\Media\Action\UploadMediaAction;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function __construct(
        protected CreateCategoryAction $createCategoryAction,
        protected DeleteCategoryAction $deleteCategoryAction,
        protected UpdateCategoryAction $updateCategoryAction,
        protected IndexCategoryAction  $indexCategoryAction,
        protected UploadMediaAction $uploadMediaAction,
        protected ShowCategoryAction $showCategoryAction
    ) {}

    public function index(IndexCategoryRequest $request): AnonymousResourceCollection
    {
        $dto = IndexCategoryDto::fromRequest($request);

        return $this->indexCategoryAction->run($dto);
    }

    public function show(ShowCategoryRequest $request): CategoryResource
    {
        $dto = ShowCategoryDto::fromRequest($request);

        return $this->showCategoryAction->run($dto);
    }

    public function create(CreateCategoryRequest $request): JsonResource
    {
        $dto = CreateCategoryDto::fromRequest($request);

        return $this->createCategoryAction->run($dto);
    }

    public function update(UpdateCategoryRequest $request): CategoryResource
    {
        $dto = UpdateCategoryDto::fromRequest($request);

        return $this->updateCategoryAction->run($dto);
    }

    public function delete(DeleteCategoryRequest $request): Response
    {
        $ids = $request->getIdS();
        $this->deleteCategoryAction->run($ids);

        return response([], 204);
    }
}
