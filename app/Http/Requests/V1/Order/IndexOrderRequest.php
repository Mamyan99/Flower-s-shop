<?php

namespace App\Http\Requests\V1\Order;

use App\Http\Requests\V1\QueryList\QueryListRequest;

class IndexOrderRequest extends QueryListRequest
{
    const COSTUMER_UNIQ_KEY = 'costumer_uniq_key';
    const FILTER_VALUE = 'filter_value';

    public function rules(): array
    {
        return [
            self::COSTUMER_UNIQ_KEY => [
                'string',
                'required',
            ],
            self::FILTER_VALUE => [
                'string',
                'nullable',
            ],
        ];
    }

    public function getCostumerUniqKey(): string
    {
        return $this->get(self::COSTUMER_UNIQ_KEY);
    }

    public function getFilterValue(): ?string
    {
        return $this->get(self::FILTER_VALUE) ?? null;
    }
}
