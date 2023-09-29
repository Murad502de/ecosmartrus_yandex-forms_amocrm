<?php

namespace App\Traits;

use Ramsey\Uuid\Uuid;

trait GenerateCodeTrait
{
    public function generateCode(): string
    {
        $code = Uuid::uuid4()->getInteger();

        return substr($code, 0, 4);
    }
}
