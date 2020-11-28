<?php declare(strict_types = 1);

namespace App\Actions\Dashboard;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\View\Factory as View;

class Dashboard
{
    private View $view;

    public function __construct(View $view)
    {
        $this->view = $view;
    }

    public function __invoke(Request $request): Renderable
    {
        return $this->view->make('dashboard', [
            'user' => $request->user(),
        ]);
    }
}
