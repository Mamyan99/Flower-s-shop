<?php

namespace App\Http\Requests\V1\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    const DISPLAY_NAME = 'display_name';
    const USERNAME = 'username';
    const PASSWORD = 'password';
    const ROLE = 'role';

    public function rules()
    {
        return [
            self::DISPLAY_NAME => [
                'string',
                'nullable',
            ],

            self::USERNAME => [
                'string',
                'required',
                'email',
                'unique:users',
            ],

            self::PASSWORD => [
                'string',
                'required',
                'min:6',
            ],
            self::ROLE => [
                'string',
                'in:admin,user',
                'nullable',
            ]
        ];
    }

    public function getDisplayName(): string | null
    {
        return $this->get(self::DISPLAY_NAME) ?? null;
    }

    public function getUsername(): string
    {
        return $this->get(self::USERNAME);
    }

    public function getPassword(): string
    {
        return $this->get(self::PASSWORD);
    }

    public function getRole(): ?string
    {
        return $this->get(self::ROLE) ?? 'user';
    }
}
