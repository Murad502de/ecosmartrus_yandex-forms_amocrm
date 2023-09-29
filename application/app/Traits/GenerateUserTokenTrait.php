<?php

namespace App\Traits;

use Ramsey\Uuid\Uuid;

trait GenerateUserTokenTrait
{
    public static function generateUserToken(): string
    {
        return md5(time()).md5(Uuid::uuid4()->toString());
    }
}
