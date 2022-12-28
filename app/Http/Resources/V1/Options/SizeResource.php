<?php

namespace App\Http\Resources\V1\Options;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string $value
 * @property string $unit_of_measurement
 */

class SizeResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'value' => $this->resource->value,
            'unit_of_measurement' => $this->resource->unit_of_measurement,
            'price' => $this->resource->pivot->price,
            'currency' => $this->resource->pivot->currency,
        ];
    }
}
