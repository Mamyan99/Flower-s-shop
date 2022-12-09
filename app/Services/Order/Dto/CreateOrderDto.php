<?php

namespace App\Services\Order\Dto;

use App\Http\Requests\V1\Order\CreateOrderRequest;

class CreateOrderDto
{
    public string $costumerUniqKey;
    public array $shopCartIds;
    public string $firstName;
    public string $lastName;
    public string $country;
    public string $region;
    public string $city;
    public string $street;
    public string $apartment;
    public string $phone;

    public static function fromRequest(CreateOrderRequest $request): self
    {
        return new self(
            costumeruniqKey: $request->getCostumerUniqKey(),
            shopCartIds: $request->getShopCartIds(),
            firstName: $request->getFirstName(),
            lastName: $request->getLastName(),
            country: $request->getCountry(),
            region: $request->getRegion(),
            city: $request->getCity(),
            street: $request->getStreet(),
            apartment: $request->getApartment(),
            phone: $request->getPhone(),
        );
    }
}
