<?php

namespace App\Repositories\Write\Media;

use App\Exceptions\DeleteErrorException;
use App\Exceptions\SavingErrorException;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaWriteRepository implements MediaWriteRepositoryInterface
{
    public function save(Media $media): bool
    {
        if (!$media->save()) {
            throw new SavingErrorException();
        }

        return true;
    }

    public function delete(array $ids): bool
    {
        $query = $this->query();

        if(!$query->whereIn('id', $ids)->delete())
        {
            throw new DeleteErrorException;
        }

        return true;
    }

    private function query(): Builder
    {
        return Media::query();
    }
}
