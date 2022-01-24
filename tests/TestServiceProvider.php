<?php

namespace OhSeeSoftware\LaravelMarkdownContent\Tests;

use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Routing\Router;
use OhSeeSoftware\LaravelMarkdownContent\LaravelMarkdownContentServiceProvider;

class TestServiceProvider extends LaravelMarkdownContentServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        parent::boot();

        $this->loadRoutesFrom(__DIR__ . '/routes/test-routes.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'markdown-content');
    }
}
