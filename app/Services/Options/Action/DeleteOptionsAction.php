<?php

namespace App\Services\Options\Action;

use App\Repositories\Write\Options\OptionsWriteRepositoryInterface;

class DeleteOptionsAction
{
    public function __construct(protected OptionsWriteRepositoryInterface $optionsWriteRepository)
    {}

    public function run(array $ids): bool
    {
        return $this->optionsWriteRepository->delete($ids);
    }
}
