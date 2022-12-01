<?php

namespace App\Models\Product;

use App\Models\Category\Category;
use App\Models\Helpers\Uuid;
use App\Models\Options\Options;
use App\Models\Rate\Rate;
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
        'price',
        'currency',
        'available_count',
    ];

    public static function create(ProductDto $dto): Product
    {
        $product = new static();

        $product->setProductId();
        $product->setName($dto->name);
        $product->setSlug($dto->name);
        $product->setShortDescription($dto->shortDescription);
        $product->setDescription($dto->description);
        $product->setPrice($dto->price);
        $product->setCurrency($dto->currency);
        $product->setAvailableCount($dto->availableCount);

        return $product;
    }

    public function updateOptions(UpdateProductDto $dto): void
    {
        $this->name = $dto->productDto->name;
        $this->setSlug($dto->productDto->name);
        $this->short_description = $dto->productDto->shortDescription;
        $this->description = $dto->productDto->description;
        $this->price = $dto->productDto->price;
        $this->currency = $dto->productDto->currency;
        $this->available_count = $dto->productDto->availableCount;
    }

    public function setProductId(): string {
        return Uuid::generate();
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setShortDescription(string|null $shortDescription): void
    {
        $this->short_description = $shortDescription;
    }

    public function setDescription(string|null $description): void
    {
        $this->description = $description;
    }

    public function setPrice(float|null $price): void
    {
        $this->price = $price;
    }

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    public function setAvailableCount(string $availableCount): void
    {
        $this->available_count = $availableCount;
    }

    public function setSlug(string $name): void
    {
        $this->slug = Str::slug($name, '_');
    }

    public function category(): BelongsToMany
    {
        return $this->belongsToMany(
            Category::class,
            'product_categories',
            'product_id',
            'category_id',
        )->withPivot(['category_id', 'product_id']);
    }

    public function options(): BelongsToMany{
        return $this->belongsToMany(
            Options::class,
            'product_options',
            'product_id',
            'options_id',
        )->withPivot(['options_id', 'product_id']);
    }

    public function rates(): HasMany
    {
        return $this->hasMany(Rate::class);
    }

    public function media(): morphToMany{
        return $this->morphToMany(Media::class, 'product','product_media');
    }

    public function searchableAs(): string
    {
        return 'products_index';
    }

    public function toSearchableArray(): array
    {
        $array = $this->only('name', 'short_description', 'description');

        $related = $this->with(['category', 'options', 'media', 'rates'])
            ->where('id', $this->id)
            ->first()
            ->toArray();

        return array_merge($array, $related);
    }
}
