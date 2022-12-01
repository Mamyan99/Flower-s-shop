<?php

namespace App\Http\Requests\V1\Product;

use App\Http\Requests\V1\QueryList\QueryListRequest;

class IndexProductRequest extends QueryListRequest
{
    const CATEGORIES_IDS  = 'categories_ids';
    const OPTIONS_IDS = 'options_ids';

    public function rules(): array
    {
        return [
            self::CATEGORIES_IDS => [
                'array',
                'nullable',
            ],
            self::OPTIONS_IDS => [
                'array',
                'nullable',
            ],
        ];
    }

    public function getCategoriesIds(): ?array
    {
        return $this->get(self::CATEGORIES_IDS) ?? null;
    }

    public function getOptionsIds(): ?array
    {
        return $this->get(self::OPTIONS_IDS) ?? null;
    }
}
