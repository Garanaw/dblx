<?php

use Illuminate\Routing\Router;

$router = app(Router::class);

$router->get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
