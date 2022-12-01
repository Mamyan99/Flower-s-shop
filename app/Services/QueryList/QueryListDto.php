<?php

namespace App\Services\QueryList;

use App\Http\Requests\V1\QueryList\QueryListRequest;
use Spatie\DataTransferObject\DataTransferObject;

class QueryListDto extends DataTransferObject
{
    public ?string $q;
    public int $page;
    public int $perPage;

    public static function fromRequest(QueryListRequest $request): self
    {
        return new self(
                q: $request->getQ(),
                page: $request->getPage(),
                perPage: $request->getPerPage(),
        );
    }
}
