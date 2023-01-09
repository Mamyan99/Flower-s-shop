<?php

namespace App\Http\Requests\V1\Product;


class UpdateProductRequest extends BaseProductRequest
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
