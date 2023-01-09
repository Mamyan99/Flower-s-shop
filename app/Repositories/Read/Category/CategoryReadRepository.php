<?php

namespace App\Repositories\Read\Category;

use App\Exceptions\CategoryDoesNotExistException;
use App\Models\Category\Category;
use App\Services\Category\Dto\IndexCategoryDto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryReadRepository implements CategoryReadRepositoryInterface
{
    public function index(IndexCategoryDto $dto): LengthAwarePaginator
    {
        return Category::search($dto->queryListDto->q)
            ->when($dto->queryListDto->sortValue, function ($query) use ($dto) {
                return $query->orderBy($dto->queryListDto->sortValue, $dto->queryListDto->sort);
            })->query(function (Builder $query) {
                $query->whereNull('parent_id')
                    ->with(['children', 'image']);
        })->paginate(
                $dto->queryListDto->perPage,
                'page',
                $dto->queryListDto->page
             );
    }

    public function getById(string $id, array $relations = []): Category
    {
        $category = $this->query()
            ->where('id', $id)
            ->with($relations)
            ->first();

        if (is_null($category)) {
            throw new CategoryDoesNotExistException();
        }

        return $category;
    }

    private function query(): Builder
    {
        return Category::query();
    }
}
