<?php namespace Bantenprov\RujukanPasienMiskin;

use Illuminate\Support\ServiceProvider;
use Bantenprov\RujukanPasienMiskin\Console\Commands\RujukanPasienMiskinCommand;

/**
 * The RujukanPasienMiskinServiceProvider class
 *
 * @package Bantenprov\RujukanPasienMiskin
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RujukanPasienMiskinServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Bootstrap handles
        $this->routeHandle();
        $this->configHandle();
        $this->langHandle();
        $this->viewHandle();
        $this->assetHandle();
        $this->migrationHandle();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('rujukan-pasien-miskin', function ($app) {
            return new RujukanPasienMiskin;
        });

        $this->app->singleton('command.rujukan-pasien-miskin', function ($app) {
            return new RujukanPasienMiskinCommand;
        });

        $this->commands('command.rujukan-pasien-miskin');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'rujukan-pasien-miskin',
            'command.rujukan-pasien-miskin',
        ];
    }

    /**
     * Loading package routes
     *
     * @return void
     */
    protected function routeHandle()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
    }

    /**
     * Loading and publishing package's config
     *
     * @return void
     */
    protected function configHandle()
    {
        $packageConfigPath = __DIR__.'/config/config.php';
        $appConfigPath     = config_path('rujukan-pasien-miskin.php');

        $this->mergeConfigFrom($packageConfigPath, 'rujukan-pasien-miskin');

        $this->publishes([
            $packageConfigPath => $appConfigPath,
        ], 'config');
    }

    /**
     * Loading and publishing package's translations
     *
     * @return void
     */
    protected function langHandle()
    {
        $packageTranslationsPath = __DIR__.'/resources/lang';

        $this->loadTranslationsFrom($packageTranslationsPath, 'rujukan-pasien-miskin');

        $this->publishes([
            $packageTranslationsPath => resource_path('lang/vendor/rujukan-pasien-miskin'),
        ], 'lang');
    }

    /**
     * Loading and publishing package's views
     *
     * @return void
     */
    protected function viewHandle()
    {
        $packageViewsPath = __DIR__.'/resources/views';

        $this->loadViewsFrom($packageViewsPath, 'rujukan-pasien-miskin');

        $this->publishes([
            $packageViewsPath => resource_path('views/vendor/rujukan-pasien-miskin'),
        ], 'views');
    }

    /**
     * Publishing package's assets (JavaScript, CSS, images...)
     *
     * @return void
     */
    protected function assetHandle()
    {
        $packageAssetsPath = __DIR__.'/resources/assets';

        $this->publishes([
            $packageAssetsPath => resource_path('assets'),
        ], 'ahh-assets');
    }

    /**
     * Publishing package's migrations
     *
     * @return void
     */
    protected function migrationHandle()
    {
        $packageMigrationsPath = __DIR__.'/database/migrations';

        $this->loadMigrationsFrom($packageMigrationsPath);

        $this->publishes([
            $packageMigrationsPath => database_path('migrations')
        ], 'migrations');
    }
}
