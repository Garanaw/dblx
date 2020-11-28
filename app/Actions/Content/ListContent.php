<?php declare(strict_types = 1);

namespace App\Actions\Content;

use App\Models\User;
use Illuminate\View\Factory as View;
use Illuminate\Contracts\Support\Renderable;

class ListContent
{
    private View $view;

    public function __construct(View $view)
    {
        $this->view = $view;
    }

    public function __invoke(User $user): Renderable
    {
        return $this->view->make('content.index', [
            'user' => $user->loadMissing('content.media'),
        ]);
    }
}
