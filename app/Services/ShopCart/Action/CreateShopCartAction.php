<?php

namespace App\Services\ShopCart\Action;

use App\Http\Resources\V1\ShopCart\ShopCartResource;
use App\Models\ShopCart\ShopCart;
use App\Repositories\Read\ShopCart\ShopCartReadRepositoryInterface;
use App\Repositories\Write\ShopCart\ShopCartWriteRepositoryInterface;
use App\Services\ShopCart\Dto\CreateShopCartDto;

class CreateShopCartAction
{
    public function __construct(
        protected ShopCartReadRepositoryInterface $shopCartReadRepository,
        protected ShopCartWriteRepositoryInterface $shopCartWriteRepository
    )
    {}

    public function run(CreateShopCartDto $dto): ShopCartResource
    {
        $shopCart = ShopCart::create($dto);

        $this->shopCartWriteRepository->save($shopCart);

        return new ShopCartResource($shopCart);
    }
}
