<?php declare(strict_types = 1);

namespace App\Actions\Content;

use App\Models\Content\Content;
use Illuminate\View\Factory as View;
use Illuminate\Contracts\Support\Renderable;

class ShowContent
{
    private View $view;

    public function __construct(View $view)
    {
        $this->view = $view;
    }

    public function __invoke(Content $content): Renderable
    {
        return $this->view->make('content.show', [
            'content' => $content
        ]);
    }
}
