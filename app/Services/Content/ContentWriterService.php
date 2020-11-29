<?php declare(strict_types = 1);

namespace App\Services\Content;

use App\Models\Content\Content;
use App\Models\Content\ContentDto;
use App\Repositories\Content\ContentWriterRepository as Writer;

class ContentWriterService
{
    private Writer $writer;

    public function __construct(Writer $writer)
    {
        $this->writer = $writer;
    }

    public function save(ContentDto $dto): Content
    {
        return $this->writer->save($dto);
    }
}
