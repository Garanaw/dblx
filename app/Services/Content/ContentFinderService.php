<?php declare(strict_types = 1);

namespace App\Services\Content;

use App\Repositories\Content\ContentFinderRepository as Finder;
use Illuminate\Database\Eloquent\Collection;

class ContentFinderService
{
    private Finder $finder;

    public function __construct(Finder $finder)
    {
        $this->finder = $finder;
    }

    public function findByTerm(string $term): Collection
    {
        return $this->finder->findByTerm($term);
    }
}
