<?php

namespace App\Repositories\Read\Options\Color;

use App\Services\Options\Dto\IndexColorDto;
use Illuminate\Pagination\LengthAwarePaginator;

interface ColorReadRepositoryInterface
{
    public function index(IndexColorDto $dto): LengthAwarePaginator;
}
