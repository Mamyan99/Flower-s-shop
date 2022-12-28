<?php

namespace App\Services\Options\Action;

use App\Http\Resources\V1\Option\OptionResource;
use App\Http\Resources\V1\Options\SizeResource;
use App\Repositories\Read\Options\Size\SizeReadRepositoryInterface;
use App\Services\Options\Dto\IndexSizeDto;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexSizeAction
{
    public function __construct(protected SizeReadRepositoryInterface $sizeReadRepository)
    {}
    public function run(IndexSizeDto $dto): AnonymousResourceCollection
    {
        $size = $this->sizeReadRepository->index($dto);

        return SizeResource::collection($size);
    }
}
