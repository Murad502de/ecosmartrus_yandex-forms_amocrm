<?php

namespace App\Traits;

use Ramsey\Uuid\Uuid;

trait GenerateUuidModelTrait
{
    use GenerateUuidTrait;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = self::generateUuid();
        });
    }
}
