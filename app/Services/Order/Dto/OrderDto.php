<?php

namespace App\Services\Order\Dto;

use App\Http\Requests\V1\Order\BaseOrderRequest;
use Spatie\DataTransferObject\DataTransferObject;

class OrderDto extends DataTransferObject
{
    public string $costumerUniqKey;
    public array  $shopCartIds;
    public string $firstName;
    public string $lastName;
//    public ?string $country;
//    public ?string $region;
//    public ?string $city;
//    public ?string $street;
//    public ?string $apartment;
    public string $phone;
    public string $deliveryDate;
    public string $address;

    public static function fromRequest(BaseOrderRequest $request): self
    {
        return new self(
            costumerUniqKey: $request->getCostumerUniqKey(),
            shopCartIds: $request->getProductIds(),
            firstName: $request->getFirstName(),
            lastName: $request->getLastName(),
//            country: $request->getCountry(),
//            region: $request->getRegion(),
//            city: $request->getCity(),
//            street: $request->getStreet(),
//            apartment: $request->getApartment(),
            phone: $request->getPhone(),
            deliveryDate: $request->getDeliveryDate(),
            address: $request->getAddress()
        );
    }
}
