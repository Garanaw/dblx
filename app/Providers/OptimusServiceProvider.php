<?php declare(strict_types = 1);

namespace App\Providers;

use Jenssegers\Optimus\Optimus;
use Illuminate\Support\ServiceProvider;

class OptimusServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Optimus::class, function ($app) {
            $config = $app['config']['optimus'];
            return new Optimus(
                (int)$config['prime'],
                (int)$config['inverse'],
                (int)$config['random']
            );
        });
    }
}
