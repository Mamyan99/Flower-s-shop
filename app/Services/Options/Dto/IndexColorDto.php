<?php

namespace App\Services\Options\Dto;

use App\Http\Requests\V1\Options\IndexColorRequest;
use App\Services\QueryList\QueryListDto;
use Spatie\DataTransferObject\DataTransferObject;

class IndexColorDto extends DataTransferObject
{
    public QueryListDto $queryListDto;

    public static function fromRequest(IndexColorRequest $request): self
    {
        return new self(
            queryListDto: QueryListDto::fromRequest($request)
        );
    }
}
