<?php

namespace App\Services\Product\Transformer;

class CreateOrUpdateSizesTransformer
{
    public function transformer(array $sizes): array
    {
        $sizesArray = [];

        foreach ($sizes as $size) {
            $sizesArray[$size['id']] = [
                'price' => $size['price'],
                'currency' => $size['currency'],
            ];
        }

        return $sizesArray;
    }
}
