<?php

namespace App\Services\ShopCart\Action;

use App\Http\Resources\V1\ShopCart\ShopCartResource;
use App\Repositories\Read\ShopCart\ShopCartReadRepositoryInterface;
use App\Services\ShopCart\Dto\IndexShopCartDto;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexShopCartAction
{
    public function __construct(protected ShopCartReadRepositoryInterface $shopCartReadRepository)
    {}

    public function run(IndexShopCartDto $dto): AnonymousResourceCollection
    {
        $shopCart = $this->shopCartReadRepository->index($dto);

        return ShopCartResource::collection($shopCart);
    }
}
