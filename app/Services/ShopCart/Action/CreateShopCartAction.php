<?php

namespace App\Services\ShopCart\Action;

use App\Exceptions\IsNotEnoughProductsCountException;
use App\Exceptions\ShopCartDoesNotExistExecption;
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
        try {
            $shopCart = $this->shopCartReadRepository->getShopCart($dto);
            $updateProductsCount = ($dto->supplement) ? $dto->productsCount + $shopCart->products_count : $shopCart->products_count - $dto->productsCount;

            if($updateProductsCount <= 0)
            {
                $this->shopCartWriteRepository->delete([$shopCart->id]);
                throw new IsNotEnoughProductsCountException();
            }

            $shopCart->updateProductCount($updateProductsCount);


        } catch(ShopCartDoesNotExistExecption $e)
        {
            $shopCart = ShopCart::create($dto);
        }

        $this->shopCartWriteRepository->save($shopCart);

        return new ShopCartResource($shopCart);
    }
}
