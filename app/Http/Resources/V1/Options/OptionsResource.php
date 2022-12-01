<?php

namespace App\Http\Resources\V1\Options;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string $name
 * @property string $slug
 * @property string $value
 * @property string $type
 */

class OptionsResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'slug' => $this->resource->slug,
            'value' => $this->resource->value,
            'type' => $this->resource->type,
        ];
    }
}
