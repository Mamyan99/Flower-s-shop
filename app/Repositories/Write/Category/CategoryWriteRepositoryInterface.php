<?php

namespace App\Repositories\Write\Category;

use App\Models\Category\Category;

interface CategoryWriteRepositoryInterface
{
    public function save(Category $category): Category;
    public function delete(array $ids): bool;
}
