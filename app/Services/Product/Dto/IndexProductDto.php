<?php

namespace App\Services\Product\Dto;

use App\Http\Requests\V1\Product\IndexProductRequest;
use App\Services\QueryList\QueryListDto;
use Spatie\DataTransferObject\DataTransferObject;

class IndexProductDto extends DataTransferObject
{
    public ?array $categoriesIds;
    public ?array $colorIds;
    public ?array $sizeIds;
    public ?int $minValue;
    public ?int $maxValue;
    public ?string $filterValue;
    public QueryListDto $queryListDto;

    public static function fromRequest(IndexProductRequest $request): self
    {
        return new self(
            categoriesIds: $request->getCategoriesIds(),
            colorIds: $request->getColorIds(),
            sizeIds:  $request->getSizeIds(),
            minValue: $request->getMin(),
            maxValue: $request->getMax(),
            filterValue: $request->getFilterValue(),
            queryListDto: QueryListDto::fromRequest($request)
        );
    }
}
