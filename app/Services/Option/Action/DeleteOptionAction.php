<?php

namespace App\Services\Option\Action;

use App\Repositories\Write\Option\OptionWriteRepositoryInterface;

class DeleteOptionAction
{
    public function __construct(protected OptionWriteRepositoryInterface $optionWriteRepository)
    {}

    public function run(array $ids): bool
    {
        return $this->optionWriteRepository->delete($ids);
    }
}
