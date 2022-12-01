<?php

namespace App\Services\Options\Action;

use App\Http\Resources\V1\Options\OptionsResource;
use App\Repositories\Read\Options\OptionsReadRepositoryInterface;
use App\Services\Options\Dto\IndexOptionsDto;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexOptionsAction
{
    public function __construct(protected OptionsReadRepositoryInterface $optionsReadRepository)
    {}
    public function run(IndexOptionsDto $dto): AnonymousResourceCollection
    {
        $options = $this->optionsReadRepository->index($dto);

        return OptionsResource::collection($options);
    }
}
