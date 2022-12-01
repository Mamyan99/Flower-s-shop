<?php

namespace App\Services\Options\Dto;

use App\Http\Requests\V1\Options\IndexOptionsRequest;
use App\Services\QueryList\QueryListDto;
use Spatie\DataTransferObject\DataTransferObject;

class IndexOptionsDto extends DataTransferObject
{
    public QueryListDto $queryListDto;

    public static function fromRequest(IndexOptionsRequest $request): self
    {
        return new self(
            queryListDto: QueryListDto::fromRequest($request)
        );
    }
}
