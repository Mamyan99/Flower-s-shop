<?php

namespace App\Repositories\Read\Options;

use App\Models\Options\Options;
use App\Services\Options\Dto\IndexOptionsDto;
use Illuminate\Pagination\LengthAwarePaginator;

interface OptionsReadRepositoryInterface
{
    public function index(IndexOptionsDto $dto): LengthAwarePaginator;
    public function getById(string $id): Options;
}
