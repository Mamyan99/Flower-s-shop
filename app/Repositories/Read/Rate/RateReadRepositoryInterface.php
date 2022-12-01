<?php

namespace App\Repositories\Read\Rate;

use App\Models\Rate\Rate;
use App\Services\Rate\Dto\CreateOrUpdateRateDto;

interface RateReadRepositoryInterface
{
    public function getRate(CreateOrUpdateRateDto $dto): Rate;
}
