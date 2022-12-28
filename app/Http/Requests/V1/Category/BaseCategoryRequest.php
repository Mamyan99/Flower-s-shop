<?php

namespace App\Http\Requests\V1\Category;

use Illuminate\Foundation\Http\FormRequest;

class BaseCategoryRequest extends FormRequest
{
    const PARENT_ID = 'parent_id';
    const NAME = 'name';
    const SHORT_DESCRIPTION = 'short_description';
    const DESCRIPTION = 'description';
    const SUB_CATEGORIES = 'sub_categories';
    const FILE = 'file';

    public function rules(): array
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
            self::SUB_CATEGORIES => [
                'array',
                'nullable',
            ],
            self::FILE => [
                'nullable',
                'mimes:svg,png,jpeg',
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

    public function getSubCategories(): array
    {
        return $this->all(self::SUB_CATEGORIES)[self::SUB_CATEGORIES] ?? [];
    }

    public function getFilePath(): ?string
    {
        return $this->file(self::FILE) ? $this->file(self::FILE)->getPathname() : null;
    }

    public function getFileName(): ?string
    {
        return $this->file(self::FILE) ? $this->file(self::FILE)->getFilename() : null;
    }

    public function getUserId(): string
    {
        return $this->user()->id;
    }
}


