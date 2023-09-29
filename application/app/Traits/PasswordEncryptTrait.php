<?php

namespace App\Traits;

trait PasswordEncryptTrait
{
    public static function passwordEncrypt(string $password): string
    {
        return md5($password);
    }
}
