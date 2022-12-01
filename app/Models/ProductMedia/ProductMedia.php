<?php

namespace App\Models\ProductMedia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ProductMedia extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = 'product_media';
}
