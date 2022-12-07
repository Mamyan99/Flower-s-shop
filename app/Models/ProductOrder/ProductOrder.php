<?php

namespace App\Models\ProductOrder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ProductOrder extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = 'product_order';
}
