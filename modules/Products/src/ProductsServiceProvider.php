<?php
namespace Products;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class ProductsServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang','products');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'products');
        $this->loadRoutesFrom(__DIR__ . '/../routes/routes.php');
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
