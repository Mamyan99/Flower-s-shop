<?php

namespace App\Repositories\Read\Product;

use App\Models\Product\Product;
use App\Services\Product\Dto\IndexProductDto;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProductReadRepositoryInterface
{
    public function index(IndexProductDto $dto): LengthAwarePaginator;
    public function getById(string $id, array $relations = []): Product;
}
