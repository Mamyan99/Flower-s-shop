<?php

namespace App\Exceptions;

class ShopCartDoesNotExistExecption  extends BusinessLogicException
{
    public function getStatus(): int
    {
        return BusinessLogicException::SHOP_CART_DOES_NOT_EXIST;
    }

    public function getStatusMessage(): string
    {
        return __('errors.shop_cart_does_not_exist_whit_that_costumer_uniq_key');
    }
}
