<?php

namespace App\Services\Media\Action;

use App\Http\Resources\V1\Media\MediaResource;
use App\Repositories\Read\Media\MediaReadRepositoryInterface;
use App\Services\Media\Dto\IndexMediaDto;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexMediaAction
{
    public function __construct(protected MediaReadRepositoryInterface $mediaReadRepository)
    {}
    public function run(IndexMediaDto $dto): AnonymousResourceCollection
    {
        $media = $this->mediaReadRepository->index($dto);

        return MediaResource::collection($media);
    }
}
