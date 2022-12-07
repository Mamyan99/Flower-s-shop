<?php

namespace App\Exceptions;

class OptionDoesNotExistException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return BusinessLogicException::OPTION_DOES_NOT_EXIST;
    }

    public function getStatusMessage(): string
    {
        return __('errors.option_does_not_exist');
    }
}
