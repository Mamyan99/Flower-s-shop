<?php

namespace App\Repositories\Write\Order;

use App\Models\Order\Order;

interface OrderWriteRepositoryInterface
{
    public function save(Order $order): Order;
}
