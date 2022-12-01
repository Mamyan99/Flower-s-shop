<?php

namespace App\Repositories\Write\Category;

use App\Exceptions\DeleteErrorException;
use App\Exceptions\SavingErrorException;
use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Builder;

class CategoryWriteRepository implements CategoryWriteRepositoryInterface
{
    public function  save(Category $category): Category
    {
        if (!$category->save())
        {
            throw new SavingErrorException();
        }

        return $category;
    }

    public function delete(array $ids): bool
    {
        $query = $this->query();

        if(!$query->whereIn('id', $ids)->delete())
        {
            throw new DeleteErrorException;
        }

        return true;
    }

    private function query(): Builder
    {
        return Category::query();
    }
}
