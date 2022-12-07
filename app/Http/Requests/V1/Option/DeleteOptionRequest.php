<?php

namespace App\Http\Requests\V1\Option;

use Illuminate\Foundation\Http\FormRequest;

class DeleteOptionRequest extends FormRequest
{
    const IDS = 'ids';

    public function rules(): array
    {
        return [
            self::IDS => [
                'array',
                'required',
            ],
        ];
    }

    public function getIdS(): array
    {
        return $this->get(self::IDS) ?? [];
    }
}
