<?php declare(strict_types = 1);

namespace App\Models\Content;

use App\Models\Builder;

final class ContentBuilder extends Builder
{
    public function search(string $term): self
    {
        return $this
            ->select('id', 'title')
            ->orLike('title', $term)
            ->orLike('description', $term)
            ->orLike('content', $term);
    }
}
