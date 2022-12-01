<?php

namespace App\Repositories\Read\Options;

use App\Exceptions\OptionsDoesNotExistException;
use App\Models\Options\Options;
use App\Services\Options\Dto\IndexOptionsDto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class OptionsReadRepository implements OptionsReadRepositoryInterface
{
    public function index(IndexOptionsdto $dto): LengthAwarePaginator
    {
        return Options::search($dto->queryListDto->q)->paginate(
                $dto->queryListDto->perPage,
                'page',
                $dto->queryListDto->page
            );
    }

    public function getById(string $id, array $relations = []): Options
    {
        $options = $this->query()
            ->where('id', $id)
            ->with($relations)
            ->first();


        if (is_null($options)) {
            throw new OptionsDoesNotExistException();
        }

        return $options;
    }

    private function query(): Builder
    {
        return Options::query();
    }
}
