<?php

namespace App\Models\Options;

use App\Models\BaseConstants\BaseConstans;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Arr;
use Laravel\Scout\Searchable;

class Size extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'id',
        'value',
        'unit_of_measurement'
    ];

    public function product(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'product_size',
            'size_id',
            'product_id'
        )->withPivot(['product_id', 'size_id', 'price', 'currency']);
    }

    public function searchableAs(): string
    {
        return BaseConstans::SIZE_INDEX;
    }

//    public function toSearchableArray(): array
//    {
//        return Arr::only(
//            $this->toArray(),
//            [BaseConstans::VALUE, BaseConstans::UNIT_OF_MEASUREMENT]
//        );
//    }

    protected function makeAllSearchableUsing($query)
    {
        return $query->with(['product']);
    }
}
