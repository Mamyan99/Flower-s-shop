<?php

namespace App\Models\ProductOptions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ProductOptions extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = 'product_options';
}
