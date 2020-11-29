<?php

namespace App\Providers;

use Closure;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\RateLimiter;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    private Router $router;

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->makeRouter();
        $this->configureRateLimiting();

        $this->routes($this->getMappedRoutes());
    }

    protected function makeRouter(): void
    {
        $this->router = $this->app->make(Router::class);
    }

    protected function getMappedRoutes(): Closure
    {
        return function () {
            $this->router->middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            $this->router->middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/content.php'));
        };
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
