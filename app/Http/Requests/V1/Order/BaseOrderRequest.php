<?php

namespace App\Http\Requests\V1\Order;

use Illuminate\Foundation\Http\FormRequest;

class BaseOrderRequest extends FormRequest
{
    const COSTUMER_UNIQ_KEY = 'costumer_uniq_key';
    const SHOP_CART_IDS = 'shop_cart_ids';
    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';
    const COUNTRY = 'country';
//    const CITY = 'city';
//    const REGION = 'region';
//    const STREET = 'street';
//    const APARTMENT = 'apartment';
    const PHONE = 'phone';
    const DELIVERY_DATE = 'delivery_date';
    const ADDRESS = 'address';

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
                'nullable',
            ],
//            self::CITY => [
//                'string',
//                'nullable',
//            ],
//            self::REGION => [
//                'string',
//                'nullable',
//            ],
//            self::STREET => [
//                'string',
//                'nullable',
//            ],
//            self::APARTMENT => [
//                'string',
//                'nullable',
//            ],
            self::PHONE => [
                'string',
                'required',
            ],
            self::DELIVERY_DATE => [
                'string',
                'required',
            ],
            self::ADDRESS => [
                'string',
                'required',
            ]
        ];
    }

    public function getCostumerUniqKey(): string
    {
        return $this->get(self::COSTUMER_UNIQ_KEY);
    }

    public function getProductIds(): array
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

//    public function getCountry(): ?string
//    {
//        return $this->get(self::COUNTRY) ?? null;
//    }
//
//    public function getCity(): ?string
//    {
//        return $this->get(self::CITY) ?? null;
//    }
//
//    public function getRegion(): ?string
//    {
//        return $this->get(self::REGION) ?? null;
//    }
//
//    public function getStreet(): ?string
//    {
//        return $this->get(self::STREET) ?? null;
//    }
//
//    public function getApartment(): ?string
//    {
//        return $this->get(self::APARTMENT) ?? null;
//    }

    public function getPhone(): string
    {
        return $this->get(self::PHONE);
    }

    public function getDeliveryDate(): string
    {
        return $this->get(self::DELIVERY_DATE);
    }

    public function getAddress(): string
    {
        return $this->get(self::ADDRESS);
    }
}
