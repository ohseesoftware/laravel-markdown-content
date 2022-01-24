<?php

namespace OhSeeSoftware\LaravelMarkdownContent;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use OhSeeSoftware\LaravelMarkdownContent\Models\Article;
use OhSeeSoftware\LaravelMarkdownContent\Models\Category;

class LaravelMarkdownContent
{
    public function article(): Builder
    {
        $class = config('markdown-content.models.article.class', Article::class);

        return $class::query();
    }

    public function category(): Builder
    {
        $class = config('markdown-content.models.category.class', Category::class);

        return $class::query();
    }

    public function routes(): void
    {
        Route::group([
            'middleware' => config('markdown-content.models.category.routes.group'),
            'prefix' => config('markdown-content.models.category.routes.prefix'),
            'as' => config('markdown-content.models.category.routes.name')
        ], function () {
            Route::get('/{category}', config('markdown-content.models.category.routes.show.controller'))->name('show');
        });

        Route::group([
            'middleware' => config('markdown-content.models.article.routes.group'),
            'as' => config('markdown-content.models.article.routes.name')
        ], function () {
            Route::group([
                'prefix' => '/og-image' . config('markdown-content.models.article.routes.prefix') . '/{type}',
            ], function () {
                Route::get('/{article}', config('markdown-content.models.article.routes.og-image.controller'))->name('og-image');
            });

            Route::group([
                'prefix' => config('markdown-content.models.article.routes.prefix') . '/{type}',
            ], function () {
                Route::get('/{article}', config('markdown-content.models.article.routes.show.controller'))->name('show');
                Route::get('/', config('markdown-content.models.article.routes.index.controller'))->name('index');
            });
        });
    }
}
