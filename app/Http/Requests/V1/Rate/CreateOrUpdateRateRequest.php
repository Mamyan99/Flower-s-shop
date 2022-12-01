<?php

namespace App\Http\Requests\V1\Rate;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrUpdateRateRequest extends FormRequest
{
    const PRODUCT_ID = 'product_id';
    const COSTUMER_UNIQ_KEY = 'costumer_uniq_key';
    const VALUE = 'value';

    public function rules()
    {
        return [
            self::PRODUCT_ID => [
                'string',
                'required',
            ],
            self::COSTUMER_UNIQ_KEY => [
                'string',
                'required',
            ],
            self::VALUE => [
                'numeric',
                'required',
                'min:0',
                'max:5',
            ],
        ];
    }

    public function getProductId(): string
    {
        return $this->get(self::PRODUCT_ID);
    }

    public function getCostumerUniqKey(): string
    {
        return $this->get(self::COSTUMER_UNIQ_KEY);
    }

    public function getValue(): float
    {
        return $this->get(self::VALUE);
    }
}
