<?php declare(strict_types = 1);

namespace App\Models;

use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;

class Media extends BaseMedia
{
    public function isVideo(): bool
    {
        return $this->getTypeFromMime() === 'video';
    }

    public function isImage(): bool
    {
        return $this->getTypeFromMime() === 'image';
    }
}
