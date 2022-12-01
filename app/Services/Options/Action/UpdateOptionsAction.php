<?php

namespace App\Services\Options\Action;

use App\Http\Resources\V1\Options\OptionsResource;
use App\Repositories\Read\Options\OptionsReadRepositoryInterface;
use App\Repositories\Write\Options\OptionsWriteRepositoryInterface;
use App\Services\Options\Dto\UpdateOptionsDto;

class UpdateOptionsAction
{
    public function __construct(
        protected OptionsReadRepositoryInterface $optionsReadRepository,
        protected OptionsWriteRepositoryInterface $optionsWriteRepository
    )
    {}
    public function run(UpdateOptionsDto $dto): OptionsResource
    {
        try{
            $options = $this->optionsReadRepository->getById($dto->id);
            $options->updateOptions($dto);
            $this->optionsWriteRepository->save($options);

        } catch (\Throwable $exception) {
            throw $exception;
        }

        return new OptionsResource($options);
    }
}
