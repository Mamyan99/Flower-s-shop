<?php

namespace App\Http\Requests\V1\Product;

use App\Http\Requests\V1\QueryList\QueryListRequest;

class IndexProductRequest extends QueryListRequest
{
    const CATEGORIES_IDS  = 'categories_ids';
    const OPTIONS_IDS = 'options_ids';
    const MIN = 'min';
    const MAX = 'max';
    const SORT = 'sort';


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
            self::MIN => [
                'integer',
                'nullable',
            ],
            self::MAX => [
                'integer',
                'nullable',
            ],
            self::SORT => [
                'string',
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

    public function getMin(): ?int
    {
        return $this->get(self::MIN) ?? null;
    }

    public function getMax(): ?int
    {
        return $this->get(self::MAX) ?? null;
    }

    public function getSort(): ?string
    {
        return $this->get(self::SORT) ?? null;
    }
}
