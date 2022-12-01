<?php

namespace App\Http\Controllers\Api\V1\Rate;

use App\Http\Requests\V1\Rate\CreateOrUpdateRateRequest;
use App\Http\Resources\V1\Rate\RateResource;
use App\Services\Rate\Action\CreateOrUpdateRateAction;
use App\Services\Rate\Dto\CreateOrUpdateRateDto;
use Illuminate\Routing\Controller;

class RateController extends Controller
{
    public function __construct(
        protected CreateOrUpdateRateAction $createOrUpdateRateAction,
    ) {}
//    public function index(IndexRateRequest $request): AnonymousResourceCollection
//    {
//        $dto = IndexRateRequest::fromRequest($request);
//
//        return $this->->run($dto);
//    }

    public function create(CreateOrUpdateRateRequest $request): RateResource
    {
        $dto = CreateOrUpdateRateDto::fromRequest($request);

        return $this->createOrUpdateRateAction->run($dto);
    }
}
