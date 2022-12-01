<?php

namespace App\Http\Controllers\Api\V1\Options;

use App\Http\Controllers\Api\V1\Controller;
use App\Http\Requests\V1\Options\CreateOptionsRequest;
use App\Http\Requests\V1\Options\DeleteOptionsRequest;
use App\Http\Requests\V1\Options\IndexOptionsRequest;
use App\Http\Requests\V1\Options\UpdateOptionsRequest;
use App\Http\Resources\V1\Options\OptionsResource;
use App\Services\Options\Action\CreateOptionsAction;
use App\Services\Options\Action\DeleteOptionsAction;
use App\Services\Options\Action\IndexOptionsAction;
use App\Services\Options\Action\UpdateOptionsAction;
use App\Services\Options\Dto\IndexOptionsDto;
use App\Services\Options\Dto\OptionsDto;
use App\Services\Options\Dto\UpdateOptionsDto;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class OptionsController extends Controller
{
    public function __construct(
        protected CreateOptionsAction $createOptionsAction,
        protected DeleteOptionsAction $deleteOptionsAction,
        protected UpdateOptionsAction $updateOptionsAction,
        protected IndexOptionsAction  $indexOptionsAction
    ) {}

    public function index(IndexOptionsRequest $request): AnonymousResourceCollection
    {
        $dto = IndexOptionsDto::fromRequest($request);

        return $this->indexOptionsAction->run($dto);
    }

    public function create(CreateOptionsRequest $request): OptionsResource
    {
        $dto = OptionsDto::fromRequest($request);

        return $this->createOptionsAction->run($dto);
    }

    public function update(UpdateOptionsRequest $request): OptionsResource
    {
        $dto = UpdateOptionsDto::fromRequest($request);

        return $this->updateOptionsAction->run($dto);
    }

    public function delete(DeleteOptionsRequest $request): Response
    {
        $ids = $request->getIdS();
        $this->deleteOptionsAction->run($ids);

        return response([], 204);
    }
}
