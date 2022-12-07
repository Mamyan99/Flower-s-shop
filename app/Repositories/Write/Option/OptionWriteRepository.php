<?php

namespace App\Repositories\Write\Option;

use App\Exceptions\DeleteErrorException;
use App\Exceptions\SavingErrorException;
use App\Models\Option\Option;
use Illuminate\Database\Eloquent\Builder;

class OptionWriteRepository implements OptionWriteRepositoryInterface
{
    public function  save(Option $option): Option
    {
        if (!$option->save())
        {
            throw new SavingErrorException();
        }

        return $option;
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
        return Option::query();
    }
}
