<?php

namespace App\Http\Requests\V1\Option;


class UpdateOptionRequest extends BaseOptionRequest
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
