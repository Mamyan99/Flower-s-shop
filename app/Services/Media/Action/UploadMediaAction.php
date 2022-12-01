<?php

namespace App\Services\Media\Action;

use App\Repositories\Read\User\UserReadRepositoryInterface;
use App\Repositories\Write\Media\MediaWriteRepositoryInterface;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UploadMediaAction
{
    public function __construct(
        protected UserReadRepositoryInterface $userReadRepository,
        protected MediaWriteRepositoryInterface $mediaWriteRepository
    ) {}

    public function run(string $userId, string $filePath, string $fileName, string $name = null): Media
    {
        $user = $this->userReadRepository->getById($userId);
        try {
            $media = $user->addMedia($filePath)
                ->toMediaCollection('images', 'public')
                ->setAttribute('file_name', $fileName);
        } catch (\Throwable $exception) {
            dd($exception);
        }

        $this->mediaWriteRepository->save($media);

        if ($name) {
            $media->setAttribute('name', $name);
        }

        return $media;
    }
}
