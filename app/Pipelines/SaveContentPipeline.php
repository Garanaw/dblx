<?php declare(strict_types = 1);

namespace App\Pipelines;

use App\Models\Content\ContentDto;
use App\Pipelines\Pipes\Content\SaveContentPipe;
use App\Pipelines\Pipes\Content\SaveMediaPipe;
use Illuminate\Pipeline\Pipeline;

class SaveContentPipeline extends Pipeline
{
    private array $savingPipes = [
        SaveContentPipe::class,
        SaveMediaPipe::class,
    ];

    public function pipe(ContentDto $dto): ContentDto
    {
        return $this->send($dto)
            ->through($this->savingPipes)
            ->thenReturn();
    }
}
