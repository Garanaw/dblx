<?php declare(strict_types = 1);

namespace App\Pipelines;

use App\Pipelines\Pipes\RemoveHtmlTags;
use Illuminate\Pipeline\Pipeline;

class SanitizeTextPipeline extends Pipeline
{
    /**
     * In case that any HTML tag is allowed in the future
     * (such as <strong> or <em>), a new pipe can be hooked
     * at the beginning of the pipeline to convert them to
     * a Markup syntax. It is safer anyways
     *
     * @var array|string[]
     */
    private array $sanitizers = [
        RemoveHtmlTags::class,
    ];

    public function pipe(string $text): string
    {
        return $this->send($text)
            ->through($this->sanitizers)
            ->thenReturn();
    }
}
