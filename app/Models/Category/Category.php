<?php

namespace App\Models\Category;

use App\Models\BaseConstants\BaseConstans;
use App\Models\Helpers\Uuid;
use App\Models\Product\Product;
use App\Services\Category\Dto\CategoryDto;
use App\Services\Category\Dto\UpdateCategoryDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @property string|null $parent_id
 * @property string $name
 * @property string $description
 * @property array|mixed|string|string[]|null $slug
 * @property string $short_description
 * @property mixed $id
 */
class Category extends Model
{
    use HasFactory;
    use Uuid;
    use Searchable;

    protected $fillable = [
        'id',
        'parent_id',
        'name',
        'slug',
        'short_description',
        'description',
    ];

    public static function create(CategoryDto $dto): Category
    {
        $category = new static();

        $category->setParentId($dto->parentId);
        $category->setName($dto->name);
        $category->setSlug($dto->name);
        $category->setShortDescription($dto->shortDescription);
        $category->setDescription($dto->description);

        return $category;
    }

    public function updateCategory(UpdateCategoryDto $dto): void
    {
        $this->parent_id = $dto->categoryDto->parentId;
        $this->name = $dto->categoryDto->name;
        $this->setSlug($dto->categoryDto->name);
        $this->short_description = $dto->categoryDto->shortDescription;
        $this->description = $dto->categoryDto->description;
    }

    public function setParentId(string|null $parentId): void
    {
        $this->parent_id = $parentId;
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

    public function setSlug(string $name): void
    {
        $this->slug = Str::slug($name, '_');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id', 'id')->with('children');
    }

    public function product(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'product_categories',
            'category_id',
            'product_id'
        )->withPivot(['product_id', 'category_id']);
    }

    public function media(): MorphOne
    {
        return $this->morphOne(Media::class, 'category');
    }

    public function searchableAs(): string
    {
        return BaseConstans::CATEGORIES_INDEX;
    }

    public function toSearchableArray(): array
    {
        return Arr::only(
            $this->toArray(),
            [BaseConstans::NAME, BaseConstans::SHORT_DESCRIPTION, BaseConstans::DESCRIPTION]
        );
    }
}
