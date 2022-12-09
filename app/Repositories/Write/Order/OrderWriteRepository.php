<?php

namespace App\Repositories\Write\Order;

use App\Exceptions\SavingErrorException;
use App\Models\Order\Order;

class OrderWriteRepository implements OrderWriteRepositoryInterface
{
    public function save(Order $order): Order{
        if (!$order->save())
        {
            throw new SavingErrorException();
        }

        return $order;
    }
}
