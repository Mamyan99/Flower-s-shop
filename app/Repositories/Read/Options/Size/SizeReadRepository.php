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
        return $this->query()->paginate(
            $dto->queryListDto->perPage,
            ['*'],
            'page',
            $dto->queryListDto->page
        );
    }

    private function query(): Builder
    {
        return Size::query();
    }
}
