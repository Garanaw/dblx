<?php declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder as BaseBuilder;

abstract class Builder extends BaseBuilder
{
    public function like(string $column, $term, $boolean = 'and'): self
    {
        return $this->where($column, 'LIKE', $term, $boolean);
    }

    public function orLike($column, $term): self
    {
        return $this->like($column, '%' . $term . '%', 'or');
    }
}
