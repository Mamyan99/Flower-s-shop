<?php

namespace App\Models\Options;

use App\Models\BaseConstants\BaseConstans;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Arr;
use Laravel\Scout\Searchable;

class Color extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'id',
        'value',
    ];

    public function product(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'product_color',
            'color_id',
            'product_id'
        )->withPivot(['product_id', 'color_id']);
    }

    public function searchableAs(): string
    {
        return BaseConstans::COLORS_INDEX;
    }

    public function toSearchableArray(): array
    {
        return Arr::only(
            $this->toArray(),
            [BaseConstans::VALUE]
        );
    }
}
