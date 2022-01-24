<?php

namespace OhSeeSoftware\LaravelMarkdownContent\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use OhSeeSoftware\LaravelMarkdownContent\Facades\MarkdownContent;
use Orbit\OrbitServiceProvider;
use Orchestra\Testbench\TestCase as TestbenchTestCase;

class TestCase extends TestbenchTestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        MarkdownContent::routes();

        // $this->setupDatabase();
        // $this->withFactories(__DIR__ . '/factories');
    }

    protected function setupDatabase()
    {
        // Create a schema here if you need one for testing
    }

    protected function getPackageProviders($app)
    {
        return [
            OrbitServiceProvider::class,
            TestServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
        $app['config']->set('app.key', 'base64:UhYJmk1UQ59RWxNDQAT+vLgTcOre1hQ1pK/sjEhfrsg=');
        $app['config']->set('orbit.paths.content', __DIR__ . '/orbit/content');
        $app['config']->set('orbit.paths.cache', __DIR__ . '/orbit/cache');
        $app['config']->set('markdown-content.models.article.routes.show.view', 'markdown-content::articles.show');
        $app['config']->set('markdown-content.models.article.routes.index.view', 'markdown-content::articles.index');
        $app['config']->set('markdown-content.models.category.routes.show.view', 'markdown-content::categories.show');
    }
}
