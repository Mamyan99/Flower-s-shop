<?php

namespace App\Http\Resources\V1\Media;

use Illuminate\Http\Resources\Json\JsonResource;


class MediaResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            "data" => [
                'id' => $this->resource->id,
                'filename' => $this->resource->uuid,
                'url'      => $this->resource->getUrl()
            ]
        ];
    }
}
