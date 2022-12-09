<?php

namespace App\Http\Requests\V1\ShopCart;

use Illuminate\Foundation\Http\FormRequest;

class CreateShopCartRequest extends FormRequest
{
    const PRODUCT_ID = 'product_id';
    const COSTUMER_UNIQ_KEY = 'costumer_uniq_key';
    const PRODUCTS_COUNT = 'products_count';
    const SUPPLEMENT = 'supplement';

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
            self::PRODUCTS_COUNT => [
                'int',
                'required',
            ],
            self::SUPPLEMENT => [
                'boolean',
                'required',
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

    public function getProductCounts(): int
    {
        return $this->get(self::PRODUCTS_COUNT);
    }

    public function getSupplement(): bool
    {
        return $this->get(self::SUPPLEMENT);
    }
}
