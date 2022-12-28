<?php

namespace App\Services\Options\Action;

use App\Http\Resources\V1\Options\ColorResource;
use App\Repositories\Read\Options\Color\ColorReadRepositoryInterface;
use App\Services\Options\Dto\IndexColorDto;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexColorAction
{
    public function __construct(protected ColorReadRepositoryInterface $colorReadRepository)
    {}
    public function run(IndexColorDto $dto): AnonymousResourceCollection
    {
        $color = $this->colorReadRepository->index($dto);

        return ColorResource::collection($color);
    }
}
