<?php

namespace App\Services\Order\Action;

use App\Repositories\Write\Category\CategoryWriteRepositoryInterface;
use App\Repositories\Write\Order\OrderWriteRepositoryInterface;

class DeleteOrderAction
{
    public function __construct(protected OrderWriteRepositoryInterface $orderWriteRepository)
    {}

    public function run(array $ids): bool
    {
        return $this->orderWriteRepository->delete($ids);
    }
}
