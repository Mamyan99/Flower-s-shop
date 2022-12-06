<?php

namespace App\Http\Controllers\Api\V1\ShopCart;

use App\Http\Controllers\Api\V1\Controller;
use App\Http\Requests\V1\ShopCart\CreateShopCartRequest;
use App\Http\Requests\V1\ShopCart\DeleteShopCartRequest;
use App\Http\Requests\V1\ShopCart\IndexShopCartRequest;
use App\Http\Resources\V1\ShopCart\ShopCartResource;
use App\Services\ShopCart\Action\CreateShopCartAction;
use App\Services\ShopCart\Action\DeleteShopCartAction;
use App\Services\ShopCart\Action\IndexShopCartAction;
use App\Services\ShopCart\Dto\CreateShopCartDto;
use App\Services\ShopCart\Dto\IndexShopCartDto;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ShopCartController extends Controller
{
    public function __construct(
        protected CreateShopCartAction $createShopCartAction,
        protected DeleteShopCartAction $deleteShopCartAction,
        protected IndexShopCartAction $indexShopCartAction
    ) {
    }

    public function index(IndexShopCartRequest $request): AnonymousResourceCollection
    {
        $dto = IndexShopCartDto::fromRequest($request);

        return $this->indexShopCartAction->run($dto);
    }

    public function create(CreateShopCartRequest $request): ShopCartResource
    {
        $dto = CreateShopCartDto::fromRequest($request);

        return $this->createShopCartAction->run($dto);
    }

    public function delete(DeleteShopCartRequest $request): Response
    {
        $ids = $request->getIdS();
        $this->deleteShopCartAction->run($ids);

        return response([], 204);
    }
}
