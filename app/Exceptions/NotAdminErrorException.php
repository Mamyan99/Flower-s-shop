<?php

namespace App\Exceptions;

class NotAdminErrorException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return BusinessLogicException::IS_NOT_ADMIN;
    }

    public function getStatusMessage(): string
    {
        return __('errors.user_is_not_admin');
    }
}
