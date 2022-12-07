<?php

namespace App\Models\Order;

use App\Models\Helpers\Uuid;
use App\Models\Invoice\Invoice;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $costumer_uniq_key
 * @property string $total
 * @property string $status
 */
class Order extends Model
{
    use HasFactory;
    use Uuid;

    protected $fillable = [
        'id',
        'costumer_uniq_key',
        'status',
        'total'
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

    public function product(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'product_order',
            'order_id',
            'product_id'
        )->withPivot(['product_id', 'order_id']);
    }

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }
}
