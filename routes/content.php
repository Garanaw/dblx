<?php

use App\Actions\Content\CreateContent;
use App\Actions\Content\ListContent;
use App\Actions\Content\ShowContent;
use App\Actions\Content\StoreContent;
use Illuminate\Routing\Router;

/** @var Router $router */
$router = app(Router::class);

$router->get('/{user}/content', ListContent::class)->middleware('auth');

$router->get('/content/{content}', ShowContent::class)->name('content.show');

$router->get('/{user}/content/create', CreateContent::class)
    ->middleware('auth')
    ->name('content.create');

$router->post('/{user}/content/store', StoreContent::class)
    ->middleware('auth:sanctum')
    ->name('content.store');
