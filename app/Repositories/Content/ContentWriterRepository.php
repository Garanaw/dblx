<?php

namespace App\Repositories\Content;

use App\Models\Content\Content;
use App\Models\Content\ContentDto;
use App\Pipelines\SaveContentPipeline as SavePipeline;
use Illuminate\Database\DatabaseManager as DB;

class ContentWriterRepository
{
    private DB $db;
    private SavePipeline $pipeline;

    public function __construct(DB $db, SavePipeline $pipeline)
    {
        $this->db = $db;
        $this->pipeline = $pipeline;
    }

    public function save(ContentDto $dto): Content
    {
        return $this->db->transaction(fn(): Content => $this->pipeline->pipe($dto)->content());
    }
}
