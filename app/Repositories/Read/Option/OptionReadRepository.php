<?php

namespace App\Repositories\Read\Option;

use App\Exceptions\OptionDoesNotExistException;
use App\Models\Option\Option;
use App\Services\Option\Dto\IndexOptionDto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class OptionReadRepository implements OptionReadRepositoryInterface
{
    public function index(IndexOptionDto $dto): LengthAwarePaginator
    {
        return Option::search($dto->queryListDto->q)->paginate(
                $dto->queryListDto->perPage,
                'page',
                $dto->queryListDto->page
            );
    }

    public function getById(string $id, array $relations = []): Option
    {
        $option = $this->query()
            ->where('id', $id)
            ->with($relations)
            ->first();


        if (is_null($option)) {
            throw new OptionDoesNotExistException();
        }

        return $option;
    }

    private function query(): Builder
    {
        return Option::query();
    }
}
