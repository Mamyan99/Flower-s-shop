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
            ->query(function (Builder $query) use ($dto){
                $query->with(['category', 'options', 'media'])
                    ->withAvg(relation: 'rates', column: 'value')
                    ->withCount('rates')
                    ->when($dto->categoriesIds, function ($query) use ($dto) {
                        $query->whereHas('category', function ($q) use ($dto) {
                            return $q->whereIn('category_id', $dto->categoriesIds);
                        });
                    })
                    ->when($dto->optionsIds, function ($query) use ($dto) {
                        $query->whereHas('options', function ($q) use ($dto) {
                            return $q->whereIn('options_id', $dto->optionsIds);
                        });
                    });
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
}
