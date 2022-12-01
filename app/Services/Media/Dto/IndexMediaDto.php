<?php

namespace App\Services\Media\Dto;

use App\Http\Requests\V1\Media\IndexMediaRequest;
use App\Services\QueryList\QueryListDto;
use Spatie\DataTransferObject\DataTransferObject;

class IndexMediaDto extends DataTransferObject
{
    public QueryListDto $queryListDto;

    public static function fromRequest(IndexMediaRequest $request): self
    {
        return new self(
            queryListDto: QueryListDto::fromRequest($request)
        );
    }
}
