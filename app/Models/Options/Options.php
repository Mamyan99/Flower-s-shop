<?php

namespace App\Models\Options;

use App\Models\Helpers\Uuid;
use App\Models\Product\Product;
use App\Services\Options\Dto\OptionsDto;
use App\Services\Options\Dto\UpdateOptionsDto;
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
class Options extends Model
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

    public static function create(OptionsDto $dto): Options
    {
        $options = new static();

        $options->setName($dto->name);
        $options->setSlug($dto->name);
        $options->setValue($dto->value);
        $options->setType($dto->type);

        return $options;
    }

    public function updateOptions(UpdateOptionsDto $dto): void
    {
        $this->name = $dto->optionsDto->name;
        $this->setSlug($dto->optionsDto->name);
        $this->value = $dto->optionsDto->value;
        $this->type = $dto->optionsDto->type;
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
            'product_options',
            'options_id',
            'product_id'
        )->withPivot(['product_id', 'options_id']);
    }

    public function searchableAs(): string
    {
        return 'options_index';
    }

    public function toSearchableArray(): array
    {
        return Arr::only(
            $this->toArray(),
            ['name', 'value', 'type']
        );
    }
}
