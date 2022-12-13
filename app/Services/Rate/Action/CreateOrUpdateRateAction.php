<?php

namespace App\Services\Rate\Action;

use App\Exceptions\RateNotFoundException;
use App\Http\Resources\V1\Rate\RateResource;
use App\Models\Rate\Rate;
use App\Repositories\Read\Rate\RateReadRepositoryInterface;
use App\Repositories\Write\Rate\RateWriteRepositoryInterface;
use App\Services\Rate\Dto\CreateOrUpdateRateDto;

class CreateOrUpdateRateAction
{
    public function __construct(
        protected RateWriteRepositoryInterface $rateWriteRepository,
        protected RateReadRepositoryInterface $rateReadRepository
    )
    {}

    public function run(CreateOrUpdateRateDto $dto): RateResource
    {
        try {
            $rate = $this->rateReadRepository->getRate($dto);
            $rate->updateRate($dto);
        } catch(RateNotFoundException $e)
        {
            $rate = Rate::create($dto);
        }

        $this->rateWriteRepository->save($rate);

        return new RateResource($rate);
    }
}
