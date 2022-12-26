<?php

namespace App\Services\Media\Action;

use App\Services\Media\UseCase\UploadMediaUseCase;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UploadMediaAction
{
    public function __construct(protected UploadMediaUseCase $uploadMediaUseCase)
    {}

    public function run(string $userId, string $filePath, string $fileName, string $name = null): Media
    {
        return $this->uploadMediaUseCase->run($userId, $filePath, $fileName, $name);
    }
}
