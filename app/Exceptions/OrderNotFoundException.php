<?php

namespace App\Exceptions;

class OrderNotFoundException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return BusinessLogicException::Order_DOES_NOT_EXIST;
    }

    public function getStatusMessage(): string
    {
        return __('errors.order_not_found');
    }
}
