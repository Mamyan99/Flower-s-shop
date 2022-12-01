<?php

namespace App\Http\Requests\V1\Options;

use Illuminate\Foundation\Http\FormRequest;

class DeleteOptionsRequest extends FormRequest
{
    const IDS = 'ids';

    public function rules(): array
    {
        return [
            self::IDS => [
                'array',
            ],
        ];
    }

    public function getIdS(): array
    {
        return $this->get(self::IDS) ?? [];
    }
}
