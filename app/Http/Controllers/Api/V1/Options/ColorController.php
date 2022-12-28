<?php

namespace App\Http\Controllers\Api\V1\Options;

use App\Http\Controllers\Api\V1\Controller;
use App\Http\Requests\V1\Options\IndexColorRequest;
use App\Services\Options\Action\IndexColorAction;
use App\Services\Options\Dto\IndexColorDto;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ColorController extends Controller
{
    public function  __construct(protected IndexColorAction $indexColorAction)
    {}

    public function index(IndexColorRequest $request): AnonymousResourceCollection
    {
        $dto = IndexColorDto::fromRequest($request);

        return $this->indexColorAction->run($dto);
    }
}
