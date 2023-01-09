<?php

namespace App\Http\Controllers\Api\V1\Product;

use App\Http\Controllers\Api\V1\Controller;
use App\Http\Requests\V1\Product\CreateProductRequest;
use App\Http\Requests\V1\Product\DeleteProductRequest;
use App\Http\Requests\V1\Product\IndexProductRequest;
use App\Http\Requests\V1\Product\UpdateProductRequest;
use App\Http\Resources\V1\Product\ProductResource;
use App\Services\Product\Action\CreateProductAction;
use App\Services\Product\Action\DeleteProductAction;
use App\Services\Product\Action\IndexProductAction;
use App\Services\Product\Action\UpdateProductAction;
use App\Services\Product\Dto\CreateProductDto;
use App\Services\Product\Dto\IndexProductDto;
use App\Services\Product\Dto\UpdateProductDto;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Artisan;

class ProductController extends Controller
{
    public function __construct(
        protected CreateProductAction $createProductAction,
        protected DeleteProductAction $deleteProductAction,
        protected UpdateProductAction $updateProductAction,
        protected IndexProductAction  $indexProductAction
    ) {}
    public function index(IndexProductRequest $request): AnonymousResourceCollection
    {
        $dto = IndexProductDto::fromRequest($request);

        return $this->indexProductAction->run($dto);
    }

    public function create(CreateProductRequest $request): ProductResource
    {
        $dto = CreateProductDto::fromRequest($request);

        return $this->createProductAction->run($dto);
    }

    public function update(UpdateProductRequest $request): ProductResource
    {
        $dto = UpdateProductDto::fromRequest($request);

        return $this->updateProductAction->run($dto);
    }

    public function delete(DeleteProductRequest $request): Response
    {
        $ids = $request->getIdS();
        $this->deleteProductAction->run($ids);

        return response([], 204);
    }
}
