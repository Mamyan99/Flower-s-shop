<?php

namespace App\Http\Controllers\Api\V1\Option;

use App\Http\Controllers\Api\V1\Controller;
use App\Http\Requests\V1\Option\CreateOptionRequest;
use App\Http\Requests\V1\Option\DeleteOptionRequest;
use App\Http\Requests\V1\Option\IndexOptionRequest;
use App\Http\Requests\V1\Option\UpdateOptionRequest;
use App\Http\Resources\V1\Option\OptionResource;
use App\Services\Option\Action\CreateOptionAction;
use App\Services\Option\Action\DeleteOptionAction;
use App\Services\Option\Action\IndexOptionAction;
use App\Services\Option\Action\UpdateOptionAction;
use App\Services\Option\Dto\IndexOptionDto;
use App\Services\Option\Dto\OptionDto;
use App\Services\Option\Dto\UpdateOptionDto;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class OptionController extends Controller
{
    public function __construct(
        protected CreateOptionAction $createOptionAction,
        protected DeleteOptionAction $deleteOptionAction,
        protected UpdateOptionAction $updateOptionAction,
        protected IndexOptionAction  $indexOptionAction
    ) {}

    public function index(IndexOptionRequest $request): AnonymousResourceCollection
    {
        $dto = IndexOptionDto::fromRequest($request);

        return $this->indexOptionAction->run($dto);
    }

    public function create(CreateOptionRequest $request): OptionResource
    {
        $dto = OptionDto::fromRequest($request);

        return $this->createOptionAction->run($dto);
    }

    public function update(UpdateOptionRequest $request): OptionResource
    {
        $dto = UpdateOptionDto::fromRequest($request);

        return $this->updateOptionAction->run($dto);
    }

    public function delete(DeleteOptionRequest $request): Response
    {
        $ids = $request->getIdS();
        $this->deleteOptionAction->run($ids);

        return response([], 204);
    }
}
