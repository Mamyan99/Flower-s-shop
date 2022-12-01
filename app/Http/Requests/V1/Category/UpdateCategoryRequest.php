<?php

namespace App\Http\Requests\V1\Category;


class UpdateCategoryRequest extends BaseCategoryRequest
{
    const ID = 'id';

    public function rules()
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
