<?php

namespace App\Repositories\Read\Options\Size;

use App\Services\Options\Dto\IndexSizeDto;
use Illuminate\Pagination\LengthAwarePaginator;

interface SizeReadRepositoryInterface
{
    public function index(IndexSizeDto $dto): LengthAwarePaginator;
    public function getByIds(array $ids, array $sizeIds, array $relations = []);
}
