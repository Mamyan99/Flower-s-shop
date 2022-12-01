<?php

namespace App\Models\Helpers;

use Illuminate\Support\Str;

trait Uuid
{
    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType(): string
    {
        return 'string';
    }

    public static function generate(): string
    {
        return Str::uuid()->toString();
    }
}
