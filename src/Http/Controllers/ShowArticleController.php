<?php

namespace OhSeeSoftware\LaravelMarkdownContent\Http\Controllers;

use Illuminate\Routing\Controller;
use OhSeeSoftware\LaravelMarkdownContent\Events\RenderingArticle;
use OhSeeSoftware\LaravelMarkdownContent\Facades\MarkdownContent;

class ShowArticleController extends Controller
{
    public function __invoke(string $type, string $slug)
    {
        $article = MarkdownContent::article()
            ->when($type, fn ($query) => $query->type($type))
            ->findOrFail($slug);

        event(new RenderingArticle($article));

        return view(config('markdown-content.models.article.routes.show.view'), [
            'article' => $article,
        ]);
    }
}
