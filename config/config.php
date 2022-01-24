<?php

use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\Extension\TableOfContents\TableOfContentsExtension;
use OhSeeSoftware\LaravelMarkdownContent\Http\Controllers\IndexArticlesController;
use OhSeeSoftware\LaravelMarkdownContent\Http\Controllers\IndexCategoriesController;
use OhSeeSoftware\LaravelMarkdownContent\Http\Controllers\ShowArticleController;
use OhSeeSoftware\LaravelMarkdownContent\Http\Controllers\ShowArticleOgImageController;
use OhSeeSoftware\LaravelMarkdownContent\Http\Controllers\ShowCategoryController;
use OhSeeSoftware\LaravelMarkdownContent\Models\Article;
use OhSeeSoftware\LaravelMarkdownContent\Models\Category;

return [
    'models' => [
        'article' => [
            'class' => Article::class,
            'routes' => [
                'group' => 'web',
                'name' => 'articles.',
                'prefix' => '', // e.g. '/articles'
                'og-image' => [
                    'controller' => ShowArticleOgImageController::class,
                    'view' => 'articles.og-image'
                ],
                'show' => [
                    'controller' => ShowArticleController::class,
                    'view' => 'articles.show'
                ],
                'index' => [
                    'controller' => IndexArticlesController::class,
                    'view' => 'articles.index'
                ]
            ]
        ],
        'category' => [
            'class' => Category::class,
            'routes' => [
                'group' => 'web',
                'name' => 'categories.',
                'prefix' => '/categories', // e.g. '/categories'
                'show' => [
                    'controller' => ShowCategoryController::class,
                    'view' => 'categories.show'
                ],
            ]
        ],
    ],

    'commonmark' => [
        'extensions' => [
            new HeadingPermalinkExtension(),
            new TableOfContentsExtension()
        ],
        'environment' => [
            'heading_permalink' => [
                'symbol' => '#',
            ],
        ]
    ],
];
