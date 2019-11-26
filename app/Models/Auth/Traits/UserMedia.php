<?php

namespace App\Models\Auth\Traits;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\Models\Media;

trait UserMedia
{
    /**
     * Register all product media thumbnail conversions
     */


    public function setAvatar($attribute)
    {
        return $this->addMedia($attribute)
            ->usingFileName('avatar.' . $attribute->getClientOriginalExtension())
            ->toMediaCollection('avatar');
    }

    public function updateAvatar($attributes)
    {
        $this->removeAvatar();
        return $this->setAvatar($attributes);
    }

    public function removeAvatar()
    {
        return $this->clearMediaCollection('avatar');
    }
}