<?php

namespace App\Repositories\Read\Media;

use App\Services\Media\Dto\IndexMediaDto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaReadRepository implements MediaReadRepositoryInterface
{
    public function index(IndexMediaDto $dto): LengthAwarePaginator
    {
        $query = $this->query();

        return $query->paginate(
            $dto->queryListDto->perPage,
            ['*'],
            'page',
            $dto->queryListDto->page
        );
    }

    private function query(): Builder
    {
        return Media::query();
    }
}
