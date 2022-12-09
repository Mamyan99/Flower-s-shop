<?php

namespace App\Http\Requests\V1\Order;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    const COSTUMER_UNIQ_KEY = 'costumer_uniq_key';
    const SHOP_CART_IDS = 'shop_cart_ids';
    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';
    const COUNTRY = 'country';
    const CITY = 'city';
    const REGION = 'region';
    const STREET = 'street';
    const APARTMENT = 'apartment';
    const PHONE = 'phone';

    public function rules()
    {
        return [
            self::COSTUMER_UNIQ_KEY => [
                'string',
                'required',
            ],
            self::SHOP_CART_IDS => [
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
        ];
    }

    public function getCostumerUniqKey(): string
    {
        return $this->get(self::COSTUMER_UNIQ_KEY);
    }

    public function getShopCartIds(): array
    {
        return $this->get(self::SHOP_CART_IDS);
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
}
