<?php

namespace App\Http\Resources\V1\Category;

use App\Http\Resources\V1\Media\MediaResource;
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
            'created_at' => $this->resource->created_at,
            'sub_categories' => SubCategoryResource::collection($this->whenLoaded('children')),
            'media' => MediaResource::collection($this->whenLoaded('image')),
        ];
    }
}
