<?php

namespace App\Http\Resources\V1\Order;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string $name
 * @property string $slug
 * @property string $value
 * @property string $type
 */

class OrderResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'costumer_uniq_key' => $this->resource->costumer_uniq_key,
            'status' => $this->resource->status,
            'total' => $this->resource->total,
            'firstName' => $this->resource->first_name,
            'lastName' => $this->resource->last_name,
            'country' => $this->resource->country,
            'region' => $this->resource->region,
            'city' => $this->resource->city,
            'street' => $this->resource->street,
            'apartment' => $this->resource->apartment,
            'phone' => $this->resource->phone,
        ];
    }
}
