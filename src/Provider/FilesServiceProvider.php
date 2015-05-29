<?php

namespace Kenarkose\Files\Provider;


use Illuminate\Support\ServiceProvider;

class FilesServiceProvider extends ServiceProvider {

    const version = '0.9.0';

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerModelDeterminer();

        $this->registerCommands();
    }

    /**
     * Registers the model determiner
     */
    protected function registerModelDeterminer()
    {
        $this->app->singleton(
            'files.model_determiner',
            'Kenarkose\Files\Determine\ModelDeterminer'
        );
    }

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        // This is for model and migration templates
        // we use blade engine to generate these files
        $this->loadViewsFrom(dirname(__DIR__) . '/resources/templates', '_files');

        $this->publishes([
            dirname(__DIR__) . '/resources/config.php' => config_path('files.php')
        ]);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'files.model_determiner'
        ];
    }

    /**
     * Registers Transit helper commands
     */
    protected function registerCommands()
    {
        $this->commands([
            'Kenarkose\Files\Console\CreateMigrationCommand'
        ]);
    }
}