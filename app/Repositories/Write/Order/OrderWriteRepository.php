<?php

namespace App\Repositories\Write\Order;

use App\Exceptions\DeleteErrorException;
use App\Exceptions\SavingErrorException;
use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Builder;

class OrderWriteRepository implements OrderWriteRepositoryInterface
{
    public function save(Order $order): Order
    {
        if (!$order->save())
        {
            throw new SavingErrorException();
        }

        return $order;
    }

    public function attachProducts(Order $order, array $products): void
    {
        $order->product()->attach($products);
    }

    public function delete(array $ids): bool
    {
        $query = $this->query();

        if(!$query->whereIn('id', $ids)->delete())
        {
            throw new DeleteErrorException;
        }

        return true;
    }

    private function query(): Builder
    {
        return Order::query();
    }
}
