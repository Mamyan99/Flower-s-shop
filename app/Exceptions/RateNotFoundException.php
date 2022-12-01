<?php

namespace App\Exceptions;

class RateNotFoundException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return BusinessLogicException::RATE_DOES_NOT_EXIST;
    }

    public function getStatusMessage(): string
    {
        return __('errors.rate_not_found');
    }


}
