<?php declare(strict_types = 1);

namespace App\Support\UrlGenerator;


use Illuminate\Support\Str;
use Jenssegers\Optimus\Optimus;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;

class MediaPathGenerator implements PathGenerator
{
    private const BASE_IMAGE_PATH = 'images/';

    public function getPath(Media $media): string
    {
        $modelName = Str::of($media->model_type)->lower()->explode('\\')->last();
        $collectionName = $media->collection_name ? $media->collection_name . '/' : 'general/';

        return Str::of(self::BASE_IMAGE_PATH)
            ->append($collectionName)->append($modelName)->append('/')
            ->append(app(Optimus::class)->encode($media->id))
            ->append('/')->__toString();
    }

    public function getPathForConversions(Media $media): string
    {
        return $this->getPath($media).'conversions/';
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getPath($media) . 'responsive/';
    }
}
