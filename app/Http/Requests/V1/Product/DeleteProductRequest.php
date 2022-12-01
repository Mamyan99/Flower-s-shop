<?php

namespace App\Http\Requests\V1\Product;

use Illuminate\Foundation\Http\FormRequest;

class DeleteProductRequest extends FormRequest
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
