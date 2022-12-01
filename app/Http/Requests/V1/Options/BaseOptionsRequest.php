<?php

namespace App\Http\Requests\V1\Options;

use Illuminate\Foundation\Http\FormRequest;

class BaseOptionsRequest extends FormRequest
{
    const NAME = 'name';
    const VALUE = 'value';
    const TYPE = 'type';

    public function rules()
    {
        return [
            self::NAME => [
                'string',
                'required',
            ],
            self::VALUE => [
                'string',
                'required',
            ],
            self::TYPE => [
                'string',
                'required',
            ],
        ];
    }
    public function getName(): string
    {
        return $this->get(self::NAME);
    }

    public function getValue(): string
    {
        return $this->get(self::VALUE);
    }

    public function getType(): string
    {
        return $this->get(self::TYPE);
    }
}
