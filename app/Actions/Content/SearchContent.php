<?php declare(strict_types = 1);

namespace App\Actions\Content;

use App\Http\Requests\Content\SearchContentRequest as Request;
use App\Services\Content\ContentFinderService as Finder;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Factory as View;

class SearchContent
{
    private Finder $finder;
    private View $view;

    public function __construct(Finder $finder, View $view)
    {
        $this->view = $view;
        $this->finder = $finder;
    }

    public function __invoke(Request $request): Renderable
    {
        return $this->view->make('content.index', [
            'user'    => $request->user(),
            'content' => $this->finder->findByTerm($request->get('term')),
        ]);
    }
}
