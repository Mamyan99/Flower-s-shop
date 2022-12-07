<?php

namespace App\Services\Option\Action;

use App\Http\Resources\V1\Option\OptionResource;
use App\Models\Option\Option;
use App\Repositories\Write\Option\OptionWriteRepositoryInterface;
use App\Services\Option\Dto\OptionDto;

class CreateOptionAction
{
    public function __construct(protected OptionWriteRepositoryInterface $optionWriteRepository,)
    {}

    public function run(OptionDto $dto): OptionResource
    {
        $option = Option::create($dto);
        $this->optionWriteRepository->save($option);

        return new OptionResource($option);
    }
}
