<?php

namespace App\Models\ProductSize;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ProductSize extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = 'product_color';
}
