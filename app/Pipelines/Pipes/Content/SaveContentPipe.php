<?php declare(strict_types = 1);

namespace App\Pipelines\Pipes\Content;

use App\Models\Content\Content;
use App\Models\Content\ContentDto;
use App\Pipelines\SanitizeTextPipeline as Sanitizer;
use Closure;

class SaveContentPipe
{
    private Sanitizer $sanitizer;

    public function __construct(Sanitizer $sanitizer)
    {
        $this->sanitizer = $sanitizer;
    }

    public function handle(ContentDto $dto, Closure $next): ContentDto
    {
        $content = $this->prepareContent($dto);
        $dto->user()->content()->save($content);

        return $next($dto->setContent($content));
    }

    private function prepareContent(ContentDto $dto): Content
    {
        return new Content([
            'title'       => $this->sanitize($dto->getTitle()),
            'description' => $this->sanitize($dto->getDescription()),
            'content'     => $this->sanitize($dto->getContent())
        ]);
    }

    private function sanitize(?string $str): ?string
    {
        return $str
            ? $this->sanitizer->pipe($str)
            : null;
    }
}
