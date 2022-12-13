<?php

namespace App\Repositories\Read\Product;

use App\Exceptions\ProductDoesNotExistException;
use App\Models\Product\Product;
use App\Services\Product\Dto\IndexProductDto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductReadRepository implements ProductReadRepositoryInterface
{
    public function index(IndexProductDto $dto): LengthAwarePaginator
    {
        return Product::search($dto->queryListDto->q)->when($dto->sortValue, function ($query) use ($dto) {
            return $query->orderBy($dto->sortValue, $dto->sort);
        })->query(function (Builder $query) use ($dto) {
                $this->filter($query, $dto);
        })->paginate(
                $dto->queryListDto->perPage,
                'page',
                $dto->queryListDto->page
            );
    }

    public function getById(string $id, array $relations = []): Product
    {
        $product = $this->query()
            ->where('id', $id)
            ->with($relations)
            ->first();

        if (is_null($product)) {
            throw new ProductDoesNotExistException();
        }

        return $product;
    }

    private function query(): Builder
    {
        return Product::query();
    }

    private function filter(Builder $query, IndexProductDto $dto): void
    {
        $query
            ->when($dto->minValue, function ($query) use ($dto) {
             $query->where($dto->filterValue, '>', $dto->minValue);
        })->when($dto->maxValue, function ($query) use ($dto) {
                return $query->where($dto->filterValue, '<', $dto->maxValue);
        })->when($dto->minValue & $dto->maxValue, function ($query) use ($dto) {
                return $query->where($dto->filterValue, '>', $dto->minValue)
                    ->where($dto->filterValue, '<', $dto->maxValue);
        })->when($dto->categoriesIds, function ($query) use ($dto) {
                $query->whereHas('category', function ($q) use ($dto) {
                    return $q->whereIn('category_id', $dto->categoriesIds);
                });
        })->when($dto->optionsIds, function ($query) use ($dto) {
                $query->whereHas('option', function ($q) use ($dto) {
                    return $q->whereIn('option_id', $dto->optionsIds);
                });
        })->withAvg(relation: 'rates', column: 'value')
            ->with(['category', 'option', 'media'])
            ->withCount('rates');
    }
}
