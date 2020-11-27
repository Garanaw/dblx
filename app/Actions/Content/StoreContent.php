<?php declare(strict_types = 1);

namespace App\Actions\Content;

use App\Http\Requests\Content\StoreContentRequest as Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class StoreContent
{
    private Redirector $redirector;
    private Request $request;

    public function __construct(Redirector $redirector, Request $request)
    {
        $this->redirector = $redirector;
        $this->request = $request;
    }

    public function __invoke(): RedirectResponse
    {
        return $this->redirector->to();
    }
}
