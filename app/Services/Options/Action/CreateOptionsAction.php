<?php

namespace App\Services\Options\Action;

use App\Http\Resources\V1\Options\OptionsResource;
use App\Models\Options\Options;
use App\Repositories\Write\Options\OptionsWriteRepositoryInterface;
use App\Services\Options\Dto\OptionsDto;

class CreateOptionsAction
{
    public function __construct(protected OptionsWriteRepositoryInterface $optionsWriteRepository,)
    {}

    public function run(OptionsDto $dto): OptionsResource
    {
        $options = Options::create($dto);
        $this->optionsWriteRepository->save($options);

        return new OptionsResource($options);
    }
}
