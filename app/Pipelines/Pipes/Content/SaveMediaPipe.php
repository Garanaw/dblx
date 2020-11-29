<?php declare(strict_types = 1);

namespace App\Pipelines\Pipes\Content;

use App\Models\Content\ContentDto;
use Closure;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpKernel\Exception\UnsupportedMediaTypeHttpException;

class SaveMediaPipe
{
    public function handle(ContentDto $dto, Closure $next): ContentDto
    {
        if ($dto->hasMedia()) {
            $this->saveMedia($dto);
        }

        return $next($dto);
    }

    private function saveMedia(ContentDto $dto): void
    {
        // The function is not type hinted because at this point we
        // can have either string elements or UploadedFile objects
        $dto->getMedia()->each(function ($item) use ($dto): void {
            $method = $this->getMediaMethod($item);
            $collection = $this->getMediaCollection($item);

            $dto->content()
                ->$method($item, $dto->content()->getAcceptedFiles())
                ->toMediaCollection($collection);
        });
    }

    private function getMediaMethod($item): string
    {
        if (is_string($item)) {
            return 'addMediaFromUrl';
        }

        if ($item instanceof UploadedFile) {
            return 'addMedia';
        }

        throw new UnsupportedMediaTypeHttpException();
    }

    private function getMediaCollection($file): ?string
    {
        if ($file instanceof UploadedFile) {
            $file = $file->getClientOriginalName();
        }

        if (preg_match('/\.(jpeg|jpg|png|gif)$/i', $file)) {
            return 'images';
        }

        if (preg_match('\.(ogg|mp4)$/i', $file)) {
            return 'videos';
        }

        return null;
    }
}
