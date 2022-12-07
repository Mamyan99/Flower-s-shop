<?php

namespace App\Models\Invoice;

use App\Models\Helpers\Uuid;
use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Invoice extends Model
{
    use HasFactory;
    use Uuid;

    protected $fillable = [
        'id',
        'costumer_uniq_key',
        'order_id',
        'platform',
        'status',
        'pay_amount',
        'pay_url',
        'currency',
        'external_id',
    ];

    public static function create(CreateOrderDto $dto): Order
    {
        $order = new static();

        $order->setCostumerUniqKey($dto->costumerUniqKey);
        $order->setTotal($dto->total);
        $order->setStatus($dto->status);

        return $order;
    }

    public function setCostumerUniqKey(string $costumerUniqKey): void
    {
        $this->costumer_uniq_key = $costumerUniqKey;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function setTotal(string $total): void
    {
        $this->total = $total;
    }

    public function order(): HasOne
    {
        return $this->hasOne(Order::class);
    }
}

