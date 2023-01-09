<?php

namespace App\Models\Product;

use App\Models\BaseConstants\BaseConstans;
use App\Models\Category\Category;
use App\Models\Helpers\Uuid;
use App\Models\Option\Option;
use App\Models\Options\Color;
use App\Models\Options\Size;
use App\Models\Order\Order;
use App\Models\Rate\Rate;
use App\Models\ShopCart\ShopCart;
use App\Services\Product\Dto\CreateProductDto;
use App\Services\Product\Dto\ProductDto;
use App\Services\Product\Dto\UpdateProductDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @property string $name
 * @property mixed $slug
 * @property string $description
 * @property string|null $short_description
 * @property string $available_count
 * @property float|null $price
 * @property string $currency
 * @property mixed $id
 * @property string $discount
 */
class Product extends Model
{
    use HasFactory;
    use Uuid;
    use Searchable;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'short_description',
        'description',
        'available_count',
    ];

    public static function create(CreateProductDto $dto): Product
    {
        $product = new static();

        $product->setName($dto->productDto->name);
        $product->setSlug($dto->productDto->name);
        $product->setShortDescription($dto->productDto->shortDescription);
        $product->setDescription($dto->productDto->description);
        $product->setAvailableCount($dto->productDto->availableCount);
        $product->setDiscount($dto->productDto->discount);

        return $product;
    }

    public function updateProduct(UpdateProductDto $dto): void
    {
        $this->name = $dto->productDto->name;
        $this->setSlug($dto->productDto->name);
        $this->short_description = $dto->productDto->shortDescription;
        $this->description = $dto->productDto->description;
        $this->available_count = $dto->productDto->availableCount;
        $this->discount = $dto->productDto->discount;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setShortDescription(?string $shortDescription): void
    {
        $this->short_description = $shortDescription;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function setAvailableCount(string $availableCount): void
    {
        $this->available_count = $availableCount;
    }

    public function setSlug(string $name): void
    {
        $this->slug = Str::slug($name, '_');
    }

    public function setDiscount(?string $discount): void
    {
        $this->discount = $discount;
    }

    public function category(): BelongsToMany
    {
        return $this->belongsToMany(
            Category::class,
            'product_categories',
            'product_id',
            'category_id',
        )->withPivot(['category_id', 'product_id'])->with('children');
    }

    public function option(): BelongsToMany{
        return $this->belongsToMany(
            Option::class,
            'product_option',
            'product_id',
            'option_id',
        )->withPivot(['option_id', 'product_id']);
    }

    public function order(): BelongsToMany{
        return $this->belongsToMany(
            Order::class,
            'product_order',
            'product_id',
            'order_id',
        )->withPivot(['order_id', 'product_id', 'order_product_count']);
    }

    public function rates(): HasMany
    {
        return $this->hasMany(Rate::class);
    }

    public function shopCart(): HasMany
    {
        return $this->hasMany(ShopCart::class);
    }

    public function media(): morphToMany{
        return $this->morphToMany(Media::class, 'product','product_media');
    }

    public function color(): BelongsToMany{
        return $this->belongsToMany(
            Color::class,
            'product_color',
            'product_id',
            'color_id',
        )->withPivot(['color_id', 'product_id']);
    }

    public function size(): BelongsToMany{
        return $this->belongsToMany(
            Size::class,
            'product_size',
            'product_id',
            'size_id',
        )->withPivot(['size_id', 'product_id', 'price', 'currency'])->orderBy('price', 'desc');
    }

    public function searchableAs(): string
    {
        return BaseConstans::PRODUCTS_INDEX;
    }

//    public function toSearchableArray(): array
//    {
//        $array = $this->only(BaseConstans::NAME, BaseConstans::SHORT_DESCRIPTION, BaseConstans::DESCRIPTION, BaseConstans::PRICE);
//
//        $related = $this->with(['category', 'color', 'size', 'media', 'rates'])
//            ->where('id', $this->id)
//            ->first()
//            ->toArray();
//
//        return array_merge($array, $related);
//    }

    protected function makeAllSearchableUsing($query)
    {
        return $query->with(['category', 'color', 'size', 'media', 'rates']);
    }
}
