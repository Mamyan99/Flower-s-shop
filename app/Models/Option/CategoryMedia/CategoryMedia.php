<?php

namespace App\Models\Option\CategoryMedia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class CategoryMedia extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = 'category_media';
}
