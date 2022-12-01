<?php

namespace App\Models\Rate;

use App\Models\Helpers\Uuid;
use App\Models\Product\Product;
use App\Services\Rate\Dto\CreateOrUpdateRateDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

/**
 * @property string $product_id
 * @property string $costumer_uniq_key
 * @property float $value
 */
class Rate extends Model
{
    use HasFactory;
    use Uuid;
    use Searchable;

    protected $fillable = [
        'id',
        'product_id',
        'costumer_uniq_key',
        'value',
    ];

    public static function create(CreateOrUpdateRateDto $dto): Rate
    {
        $rate = new static();

        $rate->setProductId($dto->productId);
        $rate->setCostumerUniqKey($dto->costumerUniqKey);
        $rate->setValue($dto->value);

        return $rate;
    }

    public function updateRate(CreateOrUpdateRateDto $dto): void
    {
        $this->product_id = $dto->productId;
        $this->costumer_uniq_key = $dto->costumerUniqKey;
        $this->value = $dto->value;
    }

    public function setProductId(string $productId): void
    {
        $this->product_id = $productId;
    }

    public function setCostumerUniqKey(string $costumerUniqKey): void
    {
        $this->costumer_uniq_key = $costumerUniqKey;
    }

    public function setValue(float $value): void
    {
        $this->value = $value;
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
