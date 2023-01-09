<?php

namespace App\Repositories\Read\Options\Size;

use App\Models\Options\Size;
use App\Services\Options\Dto\IndexSizeDto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class SizeReadRepository implements SizeReadRepositoryInterface
{
    public function index(IndexSizeDto $dto): LengthAwarePaginator
    {
        return Size::search($dto->queryListDto->q)
            ->query(function (Builder $query) {
                $query->with(['product']);
            })->paginate(
                $dto->queryListDto->perPage,
                'page',
                $dto->queryListDto->page
            );
    }
    public function getByIds(array $ids, array $sizeIds, array $relations = [])
    {
        return Size::query()
            ->whereIn('id', $sizeIds)
            ->with(['product'])
            ->get();
    }
}
