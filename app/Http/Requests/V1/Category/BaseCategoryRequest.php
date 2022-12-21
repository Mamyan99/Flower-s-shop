<?php

namespace App\Http\Requests\V1\Category;

use Illuminate\Foundation\Http\FormRequest;

class BaseCategoryRequest extends FormRequest
{
    const PARENT_ID = 'parent_id';
    const NAME = 'name';
    const SHORT_DESCRIPTION = 'short_description';
    const DESCRIPTION = 'description';
    const SUBCATEGORIES = 'sub_categories';

    public function rules()
    {
        return [
            self::PARENT_ID => [
                'string',
                'nullable',
            ],
            self::NAME => [
                'string',
                'required',
            ],
            self::SHORT_DESCRIPTION => [
                'string',
                'nullable',
            ],
            self::DESCRIPTION => [
                'string',
                'nullable',
            ],
            self::SUBCATEGORIES => [
                'array',
                'nullable',
            ]
        ];
    }

    public function getParentId(): ?string
    {
        return $this->get(self::PARENT_ID) ?? null;
    }

    public function getName(): string
    {
        return $this->get(self::NAME);
    }

    public function getShortDescription(): ?string
    {
        return $this->get(self::SHORT_DESCRIPTION) ?? null;
    }

    public function getDescription(): ?string
    {
        return $this->get(self::DESCRIPTION) ?? null;
    }

    public function getSubCategories(): ?array
    {
        return $this->get(self::SUBCATEGORIES) ?? null;
    }
}


