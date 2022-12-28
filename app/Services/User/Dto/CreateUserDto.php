<?php

namespace App\Services\User\Dto;

use App\Http\Requests\V1\Auth\RegisterRequest;
use Spatie\DataTransferObject\DataTransferObject;

class CreateUserDto extends DataTransferObject
{
    public ?string $displayName;
    public string $username;
    public string $password;
    public ?string $role;

    public static function fromRequest(RegisterRequest $request): CreateUserDto
    {
        return new self(
            displayName: $request->getDisplayName(),
            username: $request->getUsername(),
            password: $request->getPassword(),
            role: $request->getRole()
        );
    }
}
