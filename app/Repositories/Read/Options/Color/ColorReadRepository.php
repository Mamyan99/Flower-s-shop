<?php

namespace App\Repositories\Read\Options\Color;

use App\Models\Options\Color;
use App\Services\Options\Dto\IndexColorDto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class ColorReadRepository implements ColorReadRepositoryInterface
{
    public function index(IndexColorDto $dto): LengthAwarePaginator
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
        return Color::query();
    }
}
