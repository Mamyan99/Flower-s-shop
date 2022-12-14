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
 * @property float $discount
 */

class ProductResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'slug' => $this->resource->slug,
            'short_description' => $this->resource->short_description,
            'description' => $this->resource->description,
            'price' => $this->resource->price,
            'currency' => $this->resource->currency,
            'available_count' => $this->resource->available_count,
            'bought_products_count' => $this->resource->bought_products_count,
            'discount' => $this->resource->discount,
            'discountedPrice' => $this->getDiscountedPrice(),
            'rates_average_count' => $this->resource->rates_avg_value,
            'rates_count' => $this->resource->rates_count,
            'created_at' => $this->resource->created_at,
            'categories' => CategoryResource::collection($this->whenLoaded('category')),
            'options' => OptionResource::collection($this->whenLoaded('option')),
            'media' => MediaResource::collection($this->whenLoaded('media')),
        ];
    }

    private function getDiscountedPrice()
    {
        return ($this->resource->discount)?$this->resource->price - ($this->resource->price * $this->resource->discount)/100 : null;
    }
}
