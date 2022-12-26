<?php

namespace App\Services\Media\UseCase;

use App\Repositories\Read\User\UserReadRepositoryInterface;
use App\Repositories\Write\Media\MediaWriteRepositoryInterface;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UploadMediaUseCase
{
    public function __construct(
        protected UserReadRepositoryInterface $userReadRepository,
        protected MediaWriteRepositoryInterface $mediaWriteRepository
    ) {}


    public function run(string $userId, string $filePath, string $fileName, string $name = null): Media
    {
        $user = $this->userReadRepository->getById($userId);
        $media = $user->addMedia($filePath)
            ->toMediaCollection('images', 'public')
            ->setAttribute('file_name', $fileName);
        $this->mediaWriteRepository->save($media);

        if ($name) {
            $media->setAttribute('name', $name);
        }

        return $media;
    }
}
