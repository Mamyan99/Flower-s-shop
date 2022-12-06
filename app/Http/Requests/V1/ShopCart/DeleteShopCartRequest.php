<?php

namespace App\Http\Requests\V1\ShopCart;

use Illuminate\Foundation\Http\FormRequest;

class DeleteShopCartRequest extends FormRequest
{
    const IDS = 'ids';
    const COSTUMER_UNIQ_KEY = 'costumer_uniq_key';

    public function rules(): array
    {
        return [
            self::IDS => [
                'array',
                'required',
            ],
            self::COSTUMER_UNIQ_KEY => [
                'string',
                'required',
            ],
        ];
    }

    public function getIdS(): array
    {
        return $this->get(self::IDS) ?? [];
    }

    public function getCostumerUniqKey(): array
    {
        return $this->get(self::COSTUMER_UNIQ_KEY);
    }
}
