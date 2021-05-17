<?php

namespace App\Providers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use App\Drivers\Translation;
use App\Classes\Scanner;
use App\Classes\TranslationManager;

class TranslationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->registerContainerBindings();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register package bindings in the container.
     *
     * @return void
     */
    private function registerContainerBindings()
    {
        $this->app->singleton(Scanner::class, function () {
//            app_path(),
            return new Scanner(new Filesystem, [resource_path('views')], ['trans', '__']);
        });

        $this->app->singleton(Translation::class, function ($app) {
            return (new TranslationManager($app, $app['config']['translation'], $app->make(Scanner::class)))->resolve();
        });
    }
}
