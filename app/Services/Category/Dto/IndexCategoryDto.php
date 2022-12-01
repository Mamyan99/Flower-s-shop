<?php

namespace App\Services\Category\Dto;

use App\Http\Requests\V1\Category\IndexCategoryRequest;
use App\Services\QueryList\QueryListDto;
use Spatie\DataTransferObject\DataTransferObject;

class IndexCategoryDto extends DataTransferObject
{
    public QueryListDto $queryListDto;

    public static function fromRequest(IndexCategoryRequest $request): self
    {
        return new self(
            queryListDto: QueryListDto::fromRequest($request)
        );
    }
}
