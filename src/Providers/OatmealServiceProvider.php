<?php
namespace ElleTheDev\Oatmeal\Providers;

use Illuminate\Support\ServiceProvider;
use ElleTheDev\Oatmeal\Contracts\Oatmeal as OatmealContract;
use ElleTheDev\Oatmeal\Oatmeal;

/**
 * Laravel Service Provider
 *
 * Service Provider simplifies integration into Laravel by autowiring
 * the Oatmeal interface to the concrete Oatmeal instance using the config
 * settings from file.
 */
class OatmealServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/oatmeal.php' => config_path('oatmeal.php'),
        ]);
    }

    public function register()
    {
        // load Oatmeal with config file
        $this->app->singleton(OatmealContract::class, function ($app) {
            return new Oatmeal($app->config->get('oatmeal'));
        });
    }
}
