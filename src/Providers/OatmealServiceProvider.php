<?php
namespace DerekHamilton\Oatmeal\Providers;

use Illuminate\Support\ServiceProvider;
use DerekHamilton\Oatmeal\Contracts\Oatmeal as OatmealContract;
use DerekHamilton\Oatmeal\Oatmeal;

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
