<?php

namespace App\Repositories\Write\Rate;


use App\Models\Rate\Rate;

interface RateWriteRepositoryInterface
{
    public function save(Rate $rate): Rate;
}
