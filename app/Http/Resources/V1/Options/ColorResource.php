<?php

namespace App\Http\Resources\V1\Options;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string $value
 */

class ColorResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'value' => $this->resource->value,
        ];
    }
}
