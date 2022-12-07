<?php

namespace App\Services\Product\Dto;

use App\Http\Requests\V1\Product\IndexProductRequest;
use App\Services\QueryList\QueryListDto;
use Spatie\DataTransferObject\DataTransferObject;

class IndexProductDto extends DataTransferObject
{
    public ?array $categoriesIds;
    public ?array $optionsIds;
    public ?int $minValue;
    public ?int $maxValue;
    public ?string $sort;
    public ?string $filterValue;
    public ?string $sortValue;
    public QueryListDto $queryListDto;

    public static function fromRequest(IndexProductRequest $request): self
    {
        return new self(
            categoriesIds: $request->getCategoriesIds(),
            optionsIds: $request->getOptionsIds(),
            minValue: $request->getMin(),
            maxValue: $request->getMax(),
            filterValue: $request->getFilterValue(),
            sort: $request->getSort(),
            sortValue: $request->getSortValue(),
            queryListDto: QueryListDto::fromRequest($request)
        );
    }
}
