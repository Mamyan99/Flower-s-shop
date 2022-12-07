<?php

namespace App\Models\Option;

use App\Models\Helpers\Uuid;
use App\Models\Product\Product;
use App\Services\Option\Dto\OptionDto;
use App\Services\Option\Dto\UpdateOptionDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

/**
 * @property string $name
 * @property string $value
 * @property string $type
 * @property array|mixed|string|string[]|null $slug
 */
class Option extends Model
{
    use HasFactory;
    use Uuid;
    use Searchable;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'value',
        'type',
    ];

    public static function create(OptionDto $dto): Option
    {
        $option = new static();

        $option->setName($dto->name);
        $option->setSlug($dto->name);
        $option->setValue($dto->value);
        $option->setType($dto->type);

        return $option;
    }

    public function updateOption(UpdateOptionDto $dto): void
    {
        $this->name = $dto->optionDto->name;
        $this->setSlug($dto->optionDto->name);
        $this->value = $dto->optionDto->value;
        $this->type = $dto->optionDto->type;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function setSlug(string $name): void
    {
        $this->slug = Str::slug($name, '_');
    }

    public function product(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'product_option',
            'option_id',
            'product_id'
        )->withPivot(['product_id', 'option_id']);
    }

    public function searchableAs(): string
    {
        return 'option_index';
    }

    public function toSearchableArray(): array
    {
        return Arr::only(
            $this->toArray(),
            ['name', 'value', 'type']
        );
    }
}
