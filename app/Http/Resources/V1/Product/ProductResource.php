<?php

namespace App\Http\Resources\V1\Product;

use App\Http\Resources\V1\Category\CategoryResource;
use App\Http\Resources\V1\Media\MediaResource;
use App\Http\Resources\V1\Option\OptionResource;
use App\Http\Resources\V1\Rate\RateResource;
use App\Models\ShopCart\ShopCart;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string $name
 * @property mixed $slug
 * @property string $short_description
 * @property string $description
 * @property float $price
 * @property string $currency
 * @property string $available_count
 * @property float $rates_avg_value
 * @property integer $rates_count
 * @property string $media_id
 */

class ProductResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'slug' => $this->resource->slug,
            'shortDescription' => $this->resource->short_description,
            'description' => $this->resource->description,
            'price' => $this->resource->price,
            'currency' => $this->resource->currency,
            'availableCount' => $this->resource->available_count,
            'ratesAverageCount' => $this->resource->rates_avg_value,
            'ratesCount' => $this->resource->rates_count,
            'categories' => CategoryResource::collection($this->whenLoaded('category')),
            'options' => OptionResource::collection($this->whenLoaded('option')),
            'media' => MediaResource::collection($this->whenLoaded('media')),
        ];
    }
}
