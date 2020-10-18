<?php

namespace AvoRed\Assets;

use Illuminate\Support\ServiceProvider;

class AvoRedAssetsServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     * @var bool
     */
    protected $defer = true;

    public function boot()
    {
        $this->registerAssets();
    }

    /**
     * Register the service provider.
     * @return void
     */
    public function register()
    {
        $this->registerManager();
        $this->app->singleton('avored_assets', AssetsManager::class);
    }

    public function registerAssets()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        // $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'avored-stripe');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'avored-assets');
    }

    /**
     * Register the tab Manager Instance.
     * @return void
     */
    protected function registerManager()
    {
        $this->app->singleton(
            'avored_assets',
            function () {
                new AssetsManager();
            }
        );
    }


}
