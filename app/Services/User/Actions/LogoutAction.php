<?php

namespace App\Services\User\Actions;

class LogoutAction
{
    public function run($user): void
    {
        $token = $user->token();
        $token->revoke();
    }
}
