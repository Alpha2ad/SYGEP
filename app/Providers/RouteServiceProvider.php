<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapMedecinRoutes();

        $this->mapComptableRoutes();

        $this->mapAgentRoutes();

        $this->mapAgenceRoutes();

        //
    }

    /**
     * Define the "Agence" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapAgenceRoutes()
    {
        Route::prefix('agence')
             ->middleware(['web'])
             ->namespace($this->namespace)
             ->group(base_path('routes/agence.php'));
    }    
    
    /**
     * Define the "agent" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapAgentRoutes()
    {
        Route::prefix('agent')
             ->middleware(['web'])
             ->namespace($this->namespace)
             ->group(base_path('routes/agent.php'));
    }    
    
    /**
     * Define the "comptable" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapComptableRoutes()
    {
        Route::prefix('comptable')
             ->middleware(['web'])
             ->namespace($this->namespace)
             ->group(base_path('routes/comptable.php'));
    }    
    
    /**
     * Define the "medecin" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapMedecinRoutes()
    {
        Route::prefix('medecin')
             ->middleware(['web'])
             ->namespace($this->namespace)
             ->group(base_path('routes/medecin.php'));
    }









    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
