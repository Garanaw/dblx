<?php declare(strict_types = 1);

namespace App\Models\Content;

use App\Models\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Content extends Model implements HasMedia
{
    use InteractsWithMedia;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function setTitle(string $title): self
    {
        $this->attributes['title'] = $title;
        return $this;
    }

    public function setContent(string $content): self
    {
        $this->attributes['content'] = $content;
        return $this;
    }
}
