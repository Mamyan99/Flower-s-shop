<?php

namespace App\Exceptions;

class ProductDoesNotExistException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return BusinessLogicException::PRODUCT_DOES_NOT_EXIST;
    }

    public function getStatusMessage(): string
    {
        return __('errors.product_does_not_exist');
    }
}
