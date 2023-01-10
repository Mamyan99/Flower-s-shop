<?php

namespace App\Models\ProductSize;

use App\Models\BaseConstants\BaseConstans;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Arr;
use Laravel\Scout\Searchable;

class ProductSize extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = 'product_size';

    public function productSize(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function searchableAs(): string
    {
       // return BaseConstans::PRODUCT_SIZE_INDEX;
        return 'product_size_index';
    }

        public function toSearchableArray(): array
    {
        return Arr::only(
            $this->toArray(),
            [BaseConstans::PRICE]
        );
    }

//    protected function makeAllSearchableUsing($query)
//    {
//        return $query->with(['product', 'size']);
//    }
}
