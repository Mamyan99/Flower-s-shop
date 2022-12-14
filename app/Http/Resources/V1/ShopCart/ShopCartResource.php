<?php

namespace App\Http\Resources\V1\ShopCart;

use App\Http\Resources\V1\Product\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ShopCartResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'product_id' => $this->resource->product_id,
            'costumer_uniq_key' => $this->resource->costumer_uniq_key,
            'products_count' => $this->resource->products_count,
            'bought' => $this->resource->bought ?? false,
            'product' => new ProductResource($this->whenLoaded('product')),
        ];
    }
}
