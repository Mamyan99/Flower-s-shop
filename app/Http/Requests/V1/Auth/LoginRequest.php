<?php

namespace App\Http\Requests\V1\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    const USERNAME = 'username';
    const PASSWORD = 'password';

    public function rules()
    {
        return [
            self::USERNAME => [
                'required',
                'email',
            ],
            self::PASSWORD => [
                'required',
                'min:6',
            ],
        ];
    }

    public function getUsername(): string
    {
        return $this->get(self::USERNAME);
    }

    public function getPassword(): string
    {
        return $this->get(self::PASSWORD);
    }
}
