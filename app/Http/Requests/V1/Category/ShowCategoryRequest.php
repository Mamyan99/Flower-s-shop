<?php

namespace App\Http\Requests\V1\Category;

use Illuminate\Foundation\Http\FormRequest;

class ShowCategoryRequest extends FormRequest
{
    const ID = 'id';

    public function rules(): array
    {
        return [
            self::ID => [
                'string',
            ]
        ];
    }

    public function getId(): string
    {
        return $this->route(self::ID);
    }
}
