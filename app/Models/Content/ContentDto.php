<?php declare(strict_types = 1);

namespace App\Models\Content;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Traits\ForwardsCalls;

class ContentDto
{
    use ForwardsCalls;

    private User $user;
    private Content $model;
    private string $title;
    private string $content;
    private ?string $description;

    public static function make(FormRequest $request): self
    {
        return new static(
            $request->user(),
            $request->validated()
        );
    }

    public function __construct(User $user, array $data)
    {
        $this->user = $user;
        $this->title = $data['title'];
        $this->content = $data['content'];
        $this->description = $data['description'] ?? null;
        $this->model = new Content();
    }

    public function user(): User
    {
        return $this->user;
    }

    public function content(): Content
    {
        return $this->model;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function __call($name, $arguments)
    {
        return $this->forwardCallTo($this->model, $name, $arguments);
    }
}
