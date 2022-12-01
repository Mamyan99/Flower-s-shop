<?php

namespace App\Repositories\Read\Media;

use App\Services\Media\Dto\IndexMediaDto;
use Illuminate\Pagination\LengthAwarePaginator;

interface MediaReadRepositoryInterface
{
    public function index(IndexMediaDto $dto): LengthAwarePaginator;
}
