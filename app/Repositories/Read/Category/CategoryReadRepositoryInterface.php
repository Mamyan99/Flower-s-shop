<?php

namespace App\Repositories\Read\Category;

use App\Models\Category\Category;
use App\Services\Category\Dto\IndexCategoryDto;
use Illuminate\Pagination\LengthAwarePaginator;

interface CategoryReadRepositoryInterface
{
    public function index(IndexCategoryDto $dto): LengthAwarePaginator;
    public function getById(string $id, array $relations = []): Category;
}
