<?php declare(strict_types = 1);

namespace App\Repositories\Content;

use App\Models\Content\Content;
use Illuminate\Database\Eloquent\Collection;

class ContentFinderRepository
{
    private Content $content;

    public function __construct(Content $content)
    {
        $this->content = $content;
    }

    public function findByTerm(string $term): Collection
    {
        return $this->content->newQuery()->search($term)->get();
    }
}
