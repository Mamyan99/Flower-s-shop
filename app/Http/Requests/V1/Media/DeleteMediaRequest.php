<?php

namespace App\Http\Requests\V1\Media;

use Illuminate\Foundation\Http\FormRequest;

class DeleteMediaRequest extends FormRequest
{
    const IDS = 'ids';

    public function rules(): array
    {
        return [
            self::IDS => [
                'array',
            ],
        ];
    }

    public function getIdS(): array
    {
        return $this->get(self::IDS) ?? [];
    }
}
