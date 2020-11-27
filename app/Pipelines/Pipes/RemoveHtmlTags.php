<?php declare(strict_types = 1);

namespace App\Pipelines\Pipes;

use Closure;

class RemoveHtmlTags
{
    private const ALLOWABLE_TAGS = [];

    public function handle(string $text, Closure $next): string
    {
        return $next(
            $this->clear($text)
        );
    }

    private function clear(string $text): string
    {
        return strip_tags($text, self::ALLOWABLE_TAGS);
    }
}
