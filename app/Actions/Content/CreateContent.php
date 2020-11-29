<?php declare(strict_types = 1);

namespace App\Actions\Content;

use Illuminate\Http\Request;
use Illuminate\View\Factory as View;
use Illuminate\Contracts\Support\Renderable;

class CreateContent
{
    private View $view;

    public function __construct(View $view)
    {
        $this->view = $view;
    }

    public function __invoke(Request $request): Renderable
    {
        return $this->view->make('content.create', [
            'user' => $request->user(),
        ]);
    }
}
