<?php

namespace App\Services\Option\Action;

use App\Http\Resources\V1\Option\OptionResource;
use App\Repositories\Read\Option\OptionReadRepositoryInterface;
use App\Services\Option\Dto\IndexOptionDto;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexOptionAction
{
    public function __construct(protected OptionReadRepositoryInterface $optionReadRepository)
    {}
    public function run(IndexOptionDto $dto): AnonymousResourceCollection
    {
        $option = $this->optionReadRepository->index($dto);

        return OptionResource::collection($option);
    }
}
