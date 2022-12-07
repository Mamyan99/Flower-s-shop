<?php

namespace App\Services\Option\Action;

use App\Http\Resources\V1\Option\OptionResource;
use App\Repositories\Read\Option\OptionReadRepositoryInterface;
use App\Repositories\Write\Option\OptionWriteRepositoryInterface;
use App\Services\Option\Dto\UpdateOptionDto;

class UpdateOptionAction
{
    public function __construct(
        protected OptionReadRepositoryInterface $optionReadRepository,
        protected OptionWriteRepositoryInterface $optionWriteRepository
    )
    {}
    public function run(UpdateOptionDto $dto): OptionResource
    {
        try{
            $option = $this->optionReadRepository->getById($dto->id);
            $option->updateOption($dto);
            $this->optionWriteRepository->save($option);

        } catch (\Throwable $exception) {
            throw $exception;
        }

        return new OptionResource($option);
    }
}
