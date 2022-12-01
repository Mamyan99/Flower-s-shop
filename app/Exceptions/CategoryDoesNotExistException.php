<?php

namespace App\Exceptions;

class CategoryDoesNotExistException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return BusinessLogicException::CATEGORY_DOES_NOT_EXIST;
    }

    public function getStatusMessage(): string
    {
        return __('errors.category_does_not_exist');
    }
}
