<?php

namespace App\Repositories\Write\Category;

use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Collection;

interface CategoryWriteRepositoryInterface
{
    public function save(Category $category): Category;
    public function delete(array $ids): bool;
    public function syncRelations(Category $category, array $mediaIds): void;
    public function insertSubCategories(array $subCategories): bool;
}
