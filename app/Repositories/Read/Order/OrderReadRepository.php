<?php

namespace App\Repositories\Read\Order;

use App\Exceptions\OrderNotFoundException;
use App\Models\Order\Order;
use App\Services\Order\Dto\IndexOrderDto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class OrderReadRepository implements OrderReadRepositoryInterface
{
    public function index(IndexOrderDto $dto): LengthAwarePaginator
    {
        $orders = $this->query()
            ->where('costumer_uniq_key', $dto->costumerUniqKey)
            ->when($dto->filterValue, function ($query) use ($dto) {
                $query->where('status', $dto->filterValue);
            })->with('product')
            ->paginate(
                $dto->queryListDto->perPage,
                ['*'],
                'page',
                $dto->queryListDto->page
            );

        if (is_null($orders)) {
            throw new OrderNotFoundException();
        }

        return $orders;
    }

    public function getById(string $id, array $relations = []): Order
    {
        $order = $this->query()
            ->where('id', $id)
            ->with($relations)
            ->first();


        if (is_null($order)) {
            throw new OrderNotFoundException();
        }

        return $order;
    }

    private function query(): Builder
    {
        return Order::query();
    }
}
