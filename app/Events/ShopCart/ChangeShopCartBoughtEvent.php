<?php

namespace App\Events\ShopCart;

use Illuminate\Foundation\Events\Dispatchable;

class ChangeShopCartBoughtEvent
{
    use Dispatchable;

    public function __construct( public string $shopCartId)
    {}
}
