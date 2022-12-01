<?php

namespace App\Http\Controllers\Api\V1\Media;

use App\Http\Controllers\Api\V1\Controller;
use App\Http\Requests\V1\Media\DeleteMediaRequest;
use App\Http\Requests\V1\Media\IndexMediaRequest;
use App\Http\Requests\V1\Media\UploadMediaRequest;
use App\Http\Resources\V1\Media\MediaResource;
use App\Services\Media\Action\DeleteMediaAction;
use App\Services\Media\Action\IndexMediaAction;
use App\Services\Media\Action\UploadMediaAction;
use App\Services\Media\Dto\IndexMediaDto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class MediaController extends Controller
{
    public function __construct(
        protected UploadMediaAction $uploadMediaAction,
        protected DeleteMediaAction $deleteMediaAction,
        protected IndexMediaAction $indexMediaAction
    ) {}

    public function index(IndexMediaRequest $request): AnonymousResourceCollection
    {
        $dto = IndexMediaDto::fromRequest($request);

        return $this->indexMediaAction->run($dto);
    }

    public function uploadMedia(UploadMediaRequest $request): JsonResponse
    {
        $media = $this->uploadMediaAction->run(
            $request->getUserId(),
            $request->getFilePath(),
            $request->getFileName(),
            $request->getOriginalFileName()
        );

        return $this->response(['data' => (new MediaResource($media))->toArray($request)]);
    }

    public function delete(DeleteMediaRequest $request): Response
    {
        $ids = $request->getIdS();
        $this->deleteMediaAction->run($ids);

        return response([], 204);
    }
}
