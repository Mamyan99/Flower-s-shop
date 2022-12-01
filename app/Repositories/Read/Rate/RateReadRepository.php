<?php

namespace App\Repositories\Read\Rate;

use App\Exceptions\RateNotFoundException;
use App\Models\Rate\Rate;
use App\Services\Rate\Dto\CreateOrUpdateRateDto;
use Illuminate\Database\Eloquent\Builder;

class RateReadRepository implements RateReadRepositoryInterface
{
    public function getRate(CreateOrUpdateRateDto $dto, array $relations = []): Rate
    {
        $rate = $this->query()
            ->where('product_id', $dto->productId)
            ->where('costumer_uniq_key', $dto->costumerUniqKey)
            ->first();

        if (is_null($rate)) {
            throw new RateNotFoundException();
        }

        return $rate;
    }

    private function query(): Builder
    {
        return Rate::query();
    }
}
