<?php

namespace App\Services\Order\Action;

use App\Http\Resources\V1\Order\OrderResource;
use App\Models\Order\Order;
use App\Repositories\Read\Order\OrderReadRepositoryInterface;
use App\Repositories\Read\ShopCart\ShopCartReadRepositoryInterface;
use App\Repositories\Write\Order\OrderWriteRepositoryInterface;
use App\Services\Order\Dto\CreateOrderDto;

class CreateOrderAction
{
    public function __construct(
        protected OrderReadRepositoryInterface $orderReadRepository,
        protected OrderWriteRepositoryInterface $orderWriteRepository,
        protected ShopCartReadRepositoryInterface $shopCartReadRepository
    )
    {}

    public function run(CreateOrderDto $dto): OrderResource
    {
        $shopCarts = $this->shopCartReadRepository->getShopCarts($dto, ['product']);
        $total = 0;
        $products = [];

        foreach ($shopCarts as $shopCart) {
            $price = ($shopCart->product->discount)?$shopCart->product->price - ($shopCart->product->price * $shopCart->product->discount)/100 : $shopCart->product->price;
            $productsPrice = $price * $shopCart->products_count;
            $total = $total + $productsPrice;
            $products[$shopCart->product->id] = ['order_product_count' => $shopCart->products_count];
        }

        $order = Order::create($dto);
        $order->total = $total;

        $order = $this->orderWriteRepository->save($order);
        $this->orderWriteRepository->attachProducts($order, $products);

        return new OrderResource($order);
    }
}
