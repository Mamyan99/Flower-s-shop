<?php

namespace App\Http\Controllers\Api\V1\Options;

use App\Http\Controllers\Api\V1\Controller;
use App\Http\Requests\V1\Options\IndexSizeRequest;
use App\Services\Options\Action\IndexSizeAction;
use App\Services\Options\Dto\IndexSizeDto;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SizeController extends Controller
{
    public function  __construct(protected IndexSizeAction $indexSizeAction)
    {}
    public function index(IndexSizeRequest $request): AnonymousResourceCollection
    {
        $dto = IndexSizeDto::fromRequest($request);

        return $this->indexSizeAction->run($dto);
    }
}
