<?php

namespace App\Http\Resources\V1\Rate;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string $product_id
 * @property string $costumer_uniq_key
 * @property float  $value
 */
class RateResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'productId' => $this->resource->product_id,
            'costumerUniqKey' => $this->resource->costumer_uniq_key,
            'value' => $this->resource->value,
        ];
    }
}
