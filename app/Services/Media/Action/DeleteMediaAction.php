<?php

namespace App\Services\Media\Action;

use App\Repositories\Write\Media\MediaWriteRepositoryInterface;

class DeleteMediaAction
{
    public function __construct(protected MediaWriteRepositoryInterface $mediaWriteRepository)
    {}

    public function run(array $ids): bool
    {
        return $this->mediaWriteRepository->delete($ids);
    }
}
