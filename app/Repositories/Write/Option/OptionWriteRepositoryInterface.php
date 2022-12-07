<?php

namespace App\Repositories\Write\Option;

use App\Models\Option\Option;

interface OptionWriteRepositoryInterface
{
    public function save(Option $option): Option;
    public function delete(array $ids): bool;
}
