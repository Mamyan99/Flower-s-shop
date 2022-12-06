<?php

namespace App\Http\Requests\V1\ShopCart;

use App\Http\Requests\V1\QueryList\QueryListRequest;

class IndexShopCartRequest extends QueryListRequest
{
    const COSTUMER_UNIQ_KEY = 'costumer_uniq_key';

    public function rules(): array
    {
        return [
            self::COSTUMER_UNIQ_KEY => [
                'string',
                'required',
            ],
        ];
    }

    public function getCostumerUniqKey(): string
    {
        return $this->get(self::COSTUMER_UNIQ_KEY);
    }
}
