<?php

namespace App\Models\ProductOption;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ProductOption extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = 'product_option';
}
