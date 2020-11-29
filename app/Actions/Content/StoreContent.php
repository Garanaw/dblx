<?php declare(strict_types = 1);

namespace App\Actions\Content;

use App\Http\Requests\Content\StoreContentRequest as Request;
use App\Models\Content\ContentDto;
use App\Models\User;
use App\Services\Content\ContentWriterService as Writer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Router;

class StoreContent
{
    private Redirector $redirector;
    private Request $request;
    private Router $router;
    private Writer $writer;

    public function __construct(Redirector $redirector, Request $request, Router $router, Writer $writer)
    {
        $this->redirector = $redirector;
        $this->request = $request;
        $this->router = $router;
        $this->writer = $writer;
    }

    public function __invoke(User $user): RedirectResponse
    {
        $content = $this->writer->save(ContentDto::make($this->request));
        return $this->redirector->route('content.show', [
            'content' => $content->getRenderableId(),
        ]);
    }
}
