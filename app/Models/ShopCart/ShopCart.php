<?php

namespace App\Models\ShopCart;

use App\Models\Helpers\Uuid;
use App\Models\Product\Product;
use App\Services\ShopCart\Dto\CreateShopCartDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

/**
 * @property string $product_id
 * @property string $costumer_uniq_key
 * @property int $products_count
 * @property bool $bought
 * @property mixed $id
 */
class ShopCart extends Model
{
    use HasFactory;
    use Uuid;
    use Searchable;

    protected $table = 'shop_cart';

    protected $fillable = [
        'id',
        'product_id',
        'costumer_uniq_key',
        'products_count',
        'bought'
    ];

    public static function create( $dto): ShopCart
    {
        $shopCart = new static();

        $shopCart->setProductId($dto->productId);
        $shopCart->setCostumerUniqKey($dto->costumerUniqKey);
        $shopCart->setProductsCount($dto->productsCount);

        return $shopCart;
    }

    public function updateProductCount(int $updateProductsCount): void
    {
        $this->products_count = $updateProductsCount;
    }

    public function updateBought(bool $bought): void
    {
        $this->bought = $bought;
    }

    public function setProductId(string $productId): void
    {
        $this->product_id = $productId;
    }

    public function setCostumerUniqKey(string $costumerUniqKey): void
    {
        $this->costumer_uniq_key = $costumerUniqKey;
    }

    public function setProductsCount(int $productsCount): void
    {
        $this->products_count = $productsCount;
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
