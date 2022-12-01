<?php

namespace App\Repositories\Write\Media;

use Spatie\MediaLibrary\MediaCollections\Models\Media;

interface MediaWriteRepositoryInterface
{
    public function save(Media $media): bool;
    public function delete(array $ids): bool;
}
