<?php

namespace App\Exceptions;

class IsNotEnoughProductsCountException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return BusinessLogicException::IS_NOT_ENOUGH_PRODUCTS_COUNT;
    }

    public function getStatusMessage(): string
    {
        return __('errors.is_not_enough_products_count');
    }
}
