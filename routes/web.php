<?php

use App\Actions\Dashboard\Dashboard;
use Illuminate\Routing\Router;

/** @var Router $router */
$router = app(Router::class);

$router->get('/', function () {
    return view('welcome');
});

$router->middleware(['auth:sanctum', 'verified'])->get('/dashboard', Dashboard::class)->name('dashboard');
