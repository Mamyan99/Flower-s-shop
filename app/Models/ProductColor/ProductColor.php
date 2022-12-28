<?php

namespace App\Models\ProductColor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ProductColor extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = 'product_color';
}
