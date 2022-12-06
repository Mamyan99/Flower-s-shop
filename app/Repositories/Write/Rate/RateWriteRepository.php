<?php

namespace App\Repositories\Write\Rate;

use App\Exceptions\SavingErrorException;
use App\Models\Rate\Rate;
use App\Services\Rate\Dto\CreateOrUpdateRateDto;
use Illuminate\Database\Eloquent\Builder;

class RateWriteRepository implements RateWriteRepositoryInterface
{
    public function save(Rate $rate): Rate
    {
        if (!$rate->save())
        {
            throw new SavingErrorException();
        }

        return $rate;
    }
}
