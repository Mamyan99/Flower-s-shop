<?php

namespace App\Services\Option\Dto;

use App\Http\Requests\V1\Option\IndexOptionRequest;
use App\Services\QueryList\QueryListDto;
use Spatie\DataTransferObject\DataTransferObject;

class IndexOptionDto extends DataTransferObject
{
    public QueryListDto $queryListDto;

    public static function fromRequest(IndexOptionRequest $request): self
    {
        return new self(
            queryListDto: QueryListDto::fromRequest($request)
        );
    }
}
