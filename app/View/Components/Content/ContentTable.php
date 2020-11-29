<?php declare(strict_types = 1);

namespace App\View\Components\Content;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;
use Illuminate\View\Factory as View;

class ContentTable extends Component
{
    private View $view;
    private Collection $content;
    private string $driver;

    public function __construct(Collection $content)
    {
        $this->view = app(View::class);
        $this->content = $content;
        $this->driver = $content->isEmpty() ? 'empty' : 'table';
    }

    public function render()
    {
        $view = $this->content->isEmpty() ? 'empty' : 'content';
        return $this->view->make('content.partials.' . $view . '-table', [
            'contents' => $this->content,
        ]);
    }
}
