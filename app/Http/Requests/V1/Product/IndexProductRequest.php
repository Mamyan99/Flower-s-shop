<?php

namespace App\Http\Requests\V1\Product;

use App\Http\Requests\V1\QueryList\QueryListRequest;

class IndexProductRequest extends QueryListRequest
{
    const CATEGORIES_IDS  = 'categories_ids';
    const COLOR_IDS = 'color_ids';
    const SIZE_IDS = 'size_ids';
    const MIN_VALUE = 'min';
    const MAX_VALUE = 'max';
    const FILTER_VALUE = 'filter_value';

    public function rules(): array
    {
        return [
            self::CATEGORIES_IDS => [
                'array',
                'nullable',
            ],
            self::COLOR_IDS => [
                'array',
                'nullable',
            ],
            self::SIZE_IDS => [
                'array',
                'nullable',
            ],
            self::MIN_VALUE => [
                'integer',
                'nullable',
            ],
            self::MAX_VALUE => [
                'integer',
                'nullable',
            ],
            self::FILTER_VALUE => [
                'string',
                'nullable',
            ],
        ];
    }

    public function getCategoriesIds(): ?array
    {
        return $this->get(self::CATEGORIES_IDS) ?? null;
    }

    public function getColorIds(): ?array
    {
        return $this->get(self::COLOR_IDS) ?? null;
    }

    public function getSizeIds(): ?array
    {
        return $this->get(self::SIZE_IDS) ?? null;
    }

    public function getMin(): ?int
    {
        return $this->get(self::MIN_VALUE) ?? null;
    }

    public function getMax(): ?int
    {
        return $this->get(self::MAX_VALUE) ?? null;
    }

    public function getFilterValue(): ?string
    {
        return $this->get(self::FILTER_VALUE) ?? null;
    }
}
