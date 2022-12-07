<?php

namespace App\Repositories\Read\Option;

use App\Models\Option\Option;
use App\Services\Option\Dto\IndexOptionDto;
use Illuminate\Pagination\LengthAwarePaginator;

interface OptionReadRepositoryInterface
{
    public function index(IndexOptionDto $dto): LengthAwarePaginator;
    public function getById(string $id): Option;
}
