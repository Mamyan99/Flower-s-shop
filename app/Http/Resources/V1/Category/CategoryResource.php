<?php

namespace App\Http\Resources\V1\Category;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string|null $parent_id
 * @property string $name
 * @property string $short_description
 * @property string $description
 * @property array|mixed|string|string[]|null $slug
 */

class CategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'parent_id' => $this->resource->parent_id,
            'name' => $this->resource->name,
            'slug' => $this->resource->slug,
            'short_description' => $this->resource->short_description,
            'description' => $this->resource->description,
            'sub_categories' => CategoryResource::collection($this->resource->children) ?? null
        ];
    }
}
