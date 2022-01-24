<?php

namespace OhSeeSoftware\LaravelMarkdownContent\Http\Controllers;

use Illuminate\Routing\Controller;
use OhSeeSoftware\LaravelMarkdownContent\Facades\MarkdownContent;

class IndexArticlesController extends Controller
{
    public function __invoke(string $type = null)
    {
        $articles = MarkdownContent::article()
            ->when($type, fn ($query) => $query->type($type))
            ->get();

        if ($articles->isEmpty()) {
            return abort(404, 'Page not found');
        }

        return view(config('markdown-content.models.article.routes.index.view'), [
            'type' => $type,
            'articles' => $articles,
        ]);
    }
}
