<?php

namespace App\Traits;

trait ModelAddMediaTrait
{
    public function modelAddMedia(string $mediaFromRequest, string $mediaCollection): void
    {
        $this->addMediaFromRequest($mediaFromRequest)
            ->sanitizingFileName(function ($fileName) {
                return str_replace(' ', '', strtolower($fileName));
            })
            ->toMediaCollection($mediaCollection);
    }
}
