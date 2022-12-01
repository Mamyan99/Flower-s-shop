<?php

namespace App\Services\Product\Dto;

use App\Http\Requests\V1\Product\IndexProductRequest;
use App\Services\QueryList\QueryListDto;
use Spatie\DataTransferObject\DataTransferObject;

class IndexProductDto extends DataTransferObject
{
    public ?array $categoriesIds;
    public ?array $optionsIds;
    public QueryListDto $queryListDto;

    public static function fromRequest(IndexProductRequest $request): self
    {
        return new self(
            categoriesIds: $request->getCategoriesIds(),
            optionsIds: $request->getOptionsIds(),
            queryListDto: QueryListDto::fromRequest($request)
        );
    }
}
