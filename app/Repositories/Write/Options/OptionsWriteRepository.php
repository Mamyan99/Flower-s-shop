<?php

namespace App\Repositories\Write\Options;

use App\Exceptions\DeleteErrorException;
use App\Exceptions\SavingErrorException;
use App\Models\Options\Options;
use Illuminate\Database\Eloquent\Builder;

class OptionsWriteRepository implements OptionsWriteRepositoryInterface
{
    public function  save(Options $options): Options
    {
        if (!$options->save())
        {
            throw new SavingErrorException();
        }

        return $options;
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
        return Options::query();
    }
}
