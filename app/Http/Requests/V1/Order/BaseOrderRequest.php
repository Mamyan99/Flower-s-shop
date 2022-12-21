<?php

namespace App\Http\Requests\V1\Order;

use Illuminate\Foundation\Http\FormRequest;

class BaseOrderRequest extends FormRequest
{
    const COSTUMER_UNIQ_KEY = 'costumer_uniq_key';
    const PRODUCT_IDS = 'product_ids';
    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';
    const COUNTRY = 'country';
    const CITY = 'city';
    const REGION = 'region';
    const STREET = 'street';
    const APARTMENT = 'apartment';
    const PHONE = 'phone';
    const DELIVERY_DATE = 'delivery_date';

    public function rules()
    {
        return [
            self::COSTUMER_UNIQ_KEY => [
                'string',
                'required',
            ],
            self::PRODUCT_IDS => [
                'array',
                'required',
            ],
            self::FIRST_NAME => [
                'string',
                'required',
            ],
            self::LAST_NAME => [
                'string',
                'required',
            ],
            self::COUNTRY => [
                'string',
                'required',
            ],
            self::CITY => [
                'string',
                'required',
            ],
            self::REGION => [
                'string',
                'required',
            ],
            self::STREET => [
                'string',
                'required',
            ],
            self::APARTMENT => [
                'string',
                'required',
            ],
            self::PHONE => [
                'string',
                'required',
            ],
            self::DELIVERY_DATE => [
                'string',
                'required',
            ],
        ];
    }

    public function getCostumerUniqKey(): string
    {
        return $this->get(self::COSTUMER_UNIQ_KEY);
    }

    public function getProductIds(): array
    {
        return $this->get(self::PRODUCT_IDS);
    }

    public function getFirstName(): string
    {
        return $this->get(self::FIRST_NAME);
    }

    public function getLastName(): string
    {
        return $this->get(self::LAST_NAME);
    }

    public function getCountry(): string
    {
        return $this->get(self::COUNTRY);
    }

    public function getCity(): string
    {
        return $this->get(self::CITY);
    }

    public function getRegion(): string
    {
        return $this->get(self::REGION);
    }

    public function getStreet(): string
    {
        return $this->get(self::STREET);
    }

    public function getApartment(): string
    {
        return $this->get(self::APARTMENT);
    }

    public function getPhone(): string
    {
        return $this->get(self::PHONE);
    }

    public function getDeliveryDate(): string
    {
        return $this->get(self::DELIVERY_DATE);
    }
}
