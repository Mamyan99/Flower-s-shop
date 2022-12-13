<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;

class GetWebHookEvent
{
    use Dispatchable;

    public function __construct(
        public array $productIds,
        public string $costumerUniqKey
    )
    {}
}
