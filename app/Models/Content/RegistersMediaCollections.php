<?php declare(strict_types = 1);

namespace App\Models\Content;

use App\Models\Media;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\File as MediaFile;

trait RegistersMediaCollections
{
    protected array $validMediaCollections = [
        'images',
        'videos',
    ];

    protected array $mediaProperties = [
        'accepted_images' => [
            'image/jpg',
            'image/jpeg',
            'image/png',
            'image/gif',
        ],
        'accepted_videos' => [
            'video/JPEG',
            'video/mp4',
            'video/ogg',
        ],
        'dimensions'     => [
            'height' => 400,
            'width'  => 400,
        ]
    ];

    protected function registerImageCollection(): void
    {
        $this->addMediaCollection('images')
            ->acceptsFile(function (MediaFile $file) {
                return in_array($file->mimeType, $this->mediaProperties['accepted_images']);
            })
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('images')
                    ->width($this->mediaProperties['dimensions']['width'])
                    ->height($this->mediaProperties['dimensions']['height'])
                    ->format(Manipulations::FORMAT_PNG);
            });
    }

    protected function registerVideoCollection(): void
    {
        $this->addMediaCollection('videos')
            ->acceptsFile(function (MediaFile $file) {
                return in_array($file->mimeType, $this->mediaProperties['accepted_videos']);
            });
    }

    public function getAcceptedFiles(): array
    {
        return array_merge(
            $this->mediaProperties['accepted_images'],
            $this->mediaProperties['accepted_videos']
        );
    }
}
