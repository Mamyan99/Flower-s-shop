<?php

namespace App\Services\Options\Dto;

use App\Http\Requests\V1\Options\IndexSizeRequest;
use App\Services\QueryList\QueryListDto;
use Spatie\DataTransferObject\DataTransferObject;

class IndexSizeDto extends DataTransferObject
{
    public QueryListDto $queryListDto;

    public static function fromRequest(IndexSizeRequest $request): self
    {
        return new self(
            queryListDto: QueryListDto::fromRequest($request)
        );
    }
}
