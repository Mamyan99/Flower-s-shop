<?php

namespace App\Http\Requests\V1\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RefreshTokenRequest extends FormRequest
{
    const USER_ID = 'user_id';
    const REFRESH_TOKEN = 'refresh_token';

    public function rules(): array
    {
        return [
            self::USER_ID => [
                'string',
                'required',
            ],
            self::REFRESH_TOKEN => [
                'string',
                'required',
            ]
        ];
    }

    public function getUserId(): string
    {
        return $this->get(self::USER_ID);
    }

    public function getRefreshToken(): string
    {
        return $this->get(self::REFRESH_TOKEN);
    }
}
