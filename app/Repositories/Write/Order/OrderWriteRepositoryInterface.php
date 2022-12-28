<?php

namespace App\Repositories\Write\Order;

use App\Models\Order\Order;

interface OrderWriteRepositoryInterface
{
    public function save(Order $order): Order;
    public function syncProducts(Order $order, array $products): void;
    public function delete(array $ids): bool;
}
