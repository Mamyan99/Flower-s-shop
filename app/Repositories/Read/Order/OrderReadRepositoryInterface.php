<?php

namespace App\Repositories\Read\Order;

use App\Models\Order\Order;
use App\Services\Order\Dto\IndexOrderDto;
use Illuminate\Pagination\LengthAwarePaginator;

interface OrderReadRepositoryInterface
{
    public function index(IndexOrderDto $dto): LengthAwarePaginator;
    public function getById(string $id): Order;
}
