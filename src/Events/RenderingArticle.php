<?php

namespace OhSeeSoftware\LaravelMarkdownContent\Events;

class RenderingArticle
{
    public function __construct(public $article)
    {
    }
}
