<?php

namespace App\Http\Requests\V1\Options;


class UpdateOptionsRequest extends BaseOptionsRequest
{
    const ID = 'id';

    public function rules()
    {
        return [
            self::ID => [
                'string',
                'required',
            ]
        ];
    }

    public function getId(): string
    {
        return $this->route(self::ID);
    }
}
