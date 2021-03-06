<?php

namespace OhSeeSoftware\LaravelMarkdownContent;

use Illuminate\Support\ServiceProvider;
use OhSeeSoftware\LaravelMarkdownContent\Console\Commands\MakeArticleCommand;

class LaravelMarkdownContentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-server-analytics');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-server-analytics');
        // $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        // $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('laravel-markdown-content.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-markdown-content'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laravel-markdown-content'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-markdown-content'),
            ], 'lang');*/

            // Registering package commands.
            $this->commands([
                MakeArticleCommand::class
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'markdown-content');

        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('markdown-content.php'),
        ], 'markdown-content-config');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-markdown-content', function () {
            return new LaravelMarkdownContent;
        });
    }
}
