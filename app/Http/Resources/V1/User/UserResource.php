<?php

namespace App\Http\Resources\V1\User;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string id
 * @property string|null $display_name
 * @property string $username
 */

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'display_name' => $this->resource->display_name,
            'username' => $this->resource->username,
        ];
    }
}
