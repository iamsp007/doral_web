<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/';
    public const LOGIN = '/login';
    public const ADMIN_HOME = '/admin/dashboard';
    public const COORDINATE_HOME = '/co-ordinator';
    public const CLINICIAL_HOME = '/clinician/';
    public const SUPERVISOR_HOME = '/supervisor';

    public const REFERRAL_LOGIN = '/login';
    public const REFERRAL_HOME = '/referral/dashboard';
    public const PARTNER_HOME = '/partner';
    public const PARTNER_LOGIN = '/partner/login';


    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
	 
        $this->removeIndexPHPFromURL();

        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/clinician.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/referral.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/coordinator.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/supervisor.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/partner.php'));
        });
    }
     protected function removeIndexPHPFromURL()
    {
        
        /*if (Str::contains(request()->getRequestUri(), '/index.php/')) {
            $url = str_replace('index.php/', '', request()->getRequestUri());
            
            if (strlen($url) > 0) {
                header("Location: $url", true, 301);
                exit;
            }
        }*/
    }
    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60);
        });
    }

 
}
