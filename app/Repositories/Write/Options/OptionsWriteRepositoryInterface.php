<?php

namespace App\Repositories\Write\Options;

use App\Models\Options\Options;

interface OptionsWriteRepositoryInterface
{
    public function save(Options $options): Options;
    public function delete(array $ids): bool;
}
