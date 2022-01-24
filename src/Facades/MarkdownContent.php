<?php

namespace OhSeeSoftware\LaravelMarkdownContent\Facades;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Builder article()
 * @method static Builder category()
 * @method static void routes()
 */
class MarkdownContent extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-markdown-content';
    }
}
