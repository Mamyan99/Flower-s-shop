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
            'productId' => $this->resource->product_id,
            'costumerUniqKey' => $this->resource->costumer_uniq_key,
            'productsCount' => $this->resource->products_count,
            'bought' => $this->resource->bought ?? false,
            'product' => new ProductResource($this->whenLoaded('product')),
        ];
    }
}
