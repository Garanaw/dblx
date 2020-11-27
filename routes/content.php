<?php

use App\Actions\Content\CreateContent;
use App\Actions\Content\ListContent;
use Illuminate\Routing\Router;

/** @var Router $router */
$router = app(Router::class);

$router->get('/{user}/content', ListContent::class);

$router->get('/{user}/content/create', CreateContent::class)->name('content.create');

$router->post('/{user}/content/store')->name('content.store');
