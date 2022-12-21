<?php

namespace App\Http\Requests\V1\Order;

class UpdateOrderRequest extends BaseOrderRequest
{
    const ID = 'id';
    const STATUS = 'status';

    public function rules()
    {
        return [
            self::ID => [
                'string',
            ],
            self::STATUS => [
                'string',
                'nullable',
            ]
        ];
    }

    public function getId(): string
    {
        return $this->route(self::ID);
    }

    public function getStatus(): string
    {
        return $this->get(self::STATUS);
    }
}
