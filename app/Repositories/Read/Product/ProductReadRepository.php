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
            return Product::search($dto->queryListDto->q)
                ->when($dto->queryListDto->sortValue, function ($query) use ($dto) {
                    return $query->orderBy($dto->queryListDto->sortValue, $dto->queryListDto->sort);
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
            ->when($dto->minValue, function (Builder $query) use ($dto) {
                return ($dto->filterValue === 'price') ?
                        $query->whereHas('size', function ($q) use ($dto) {
                            $q->where($dto->filterValue, '>', $dto->minValue);
                       }) : $query->where($dto->filterValue, '>', $dto->minValue);
            })->when($dto->maxValue, function ($query) use ($dto) {
                return ($dto->filterValue === 'price') ?
                    $query->whereHas('size', function ($q) use ($dto) {
                        $q->where($dto->filterValue, '<', $dto->maxValue);
                    }): $query->where($dto->filterValue, '<', $dto->maxValue);
        })->when($dto->minValue & $dto->maxValue, function ($query) use ($dto) {
                return ($dto->filterValue === 'price') ?
                    $query->whereHas('size', function ($q) use ($dto) {
                        $q->where($dto->filterValue, '>', $dto->minValue)
                            ->where($dto->filterValue, '<', $dto->maxValue);
                    }) : $query->where($dto->filterValue, '>', $dto->minValue)
                    ->where($dto->filterValue, '<', $dto->maxValue);
        })->when($dto->categoriesIds, function ($query) use ($dto) {
                $query->whereHas('category', function ($q) use ($dto) {
                    return $q->whereIn('category_id', $dto->categoriesIds);
                });
        })->when($dto->colorIds, function ($query) use ($dto) {
                $query->whereHas('color', function ($q) use ($dto) {
                    return $q->whereIn('color_id', $dto->colorIds);
                });
        })->when($dto->sizeIds, function ($query) use ($dto) {
                $query->whereHas('size', function ($q) use ($dto) {
                    return $q->whereIn('size_id', $dto->sizeIds);
                });
        }) ->withAvg(relation: 'rates', column: 'value')
            ->with(['category', 'color', 'size', 'media'])
            ->withCount('rates');
    }
}
