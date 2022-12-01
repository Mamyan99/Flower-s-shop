<?php

namespace App\Http\Requests\V1\Category;

use Illuminate\Foundation\Http\FormRequest;

class DeleteCategoryRequest extends FormRequest
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
