<?php

namespace App\Http\Requests\V1\QueryList;

use Illuminate\Foundation\Http\FormRequest;

class QueryListRequest extends FormRequest
{
    const Q = 'query';
    const PAGE = 'page';
    const PER_PAGE = 'perPage';
    const SORT_VALUE = 'sort_value';
    const SORT = 'sort';

    const DEFAULT_PAGE = 1;
    const DEFAULT_PER_PAGE = 10;

    public function rules(): array
    {
        return [
            self::Q => [
                'string',
                'nullable',
            ],
            self::PAGE => [
                'integer',
                'nullable',
            ],
            self::PER_PAGE => [
                'integer',
                'nullable',
            ],
            self::SORT_VALUE => [
                'string',
                'nullable',
            ],
            self::SORT => [
                'string',
                'in:asc,desc',
                'nullable',
            ],
        ];
    }

    public function getQ(): ?string
    {
        return $this->get(self::Q) ?? null;
    }

    public function getPage(): ?int
    {
        return $this->get(self::PAGE) ?? self::DEFAULT_PAGE;
    }

    public function getPerPage(): ?int
    {
        return $this->get(self::PER_PAGE) ?? self::DEFAULT_PER_PAGE;
    }

    public function getSort(): ?string
    {
        return $this->get(self::SORT) ?? null;
    }

    public function getSortValue(): ?string
    {
        return $this->get(self::SORT_VALUE) ?? null;
    }
}
