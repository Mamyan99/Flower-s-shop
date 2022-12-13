<?php

namespace App\Http\Requests\V1\Product;

use Illuminate\Foundation\Http\FormRequest;

class BaseProductRequest extends FormRequest
{
   const NAME = 'name';
   const MEDIA_IDS = 'media_ids';
   const SHORT_DESCRIPTION = 'short_description';
   const DESCRIPTION = 'description';
   const PRICE = 'price';
   const CURRENCY = 'currency';
   const AVAILABLE_COUNT = 'available_count';
   const CATEGORIES_IDS = 'categories_ids';
   const OPTIONS_IDS = 'options_ids';
   const DISCOUNT = 'discount';

    public function rules()
    {
        return [
            self::NAME => [
                'string',
                'required',
            ],
            self::MEDIA_IDS => [
                'array',
            ],
            self::SHORT_DESCRIPTION => [
                'string',
                'nullable',
            ],
            self::DESCRIPTION => [
                'string',
                'nullable',
            ],
            self::PRICE => [
                'numeric',
                'required',
            ],
            self::CURRENCY => [
                'string',
                'required',
            ],
            self::AVAILABLE_COUNT => [
                'int',
            ],
            self::CATEGORIES_IDS => [
                'array',
                'required',
            ],
            self::OPTIONS_IDS => [
                'array',
                'required',
            ],
            self::DISCOUNT => [
                'numeric',
                'nullable',
            ]
        ];
    }

    public function getName(): string
    {
        return $this->get(self::NAME);
    }

    public function getMediaIds(): array
    {
        return $this->get(self::MEDIA_IDS) ?? [];
    }

    public function getShortDescription(): ?string
    {
        return $this->get(self::SHORT_DESCRIPTION) ?? null;
    }

    public function getDescription(): ?string
    {
        return $this->get(self::DESCRIPTION) ?? null;
    }

    public function getPrice(): ?float
    {
        return $this->get(self::PRICE) ?? null;
    }

    public function getCurrency(): ?string
    {
        return $this->get(self::CURRENCY) ?? null;
    }

    public function getAvailableCount(): int
    {
        return $this->get(self::AVAILABLE_COUNT) ?? 0;
    }

    public function getCategoriesIds(): array
    {
        return $this->get(self::CATEGORIES_IDS);
    }

    public function getOptionsIds(): array
    {
        return $this->get(self::OPTIONS_IDS);
    }

    public function getDiscount(): float
    {
        return $this->get(self::DISCOUNT);
    }
}
