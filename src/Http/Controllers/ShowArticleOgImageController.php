<?php

namespace OhSeeSoftware\LaravelMarkdownContent\Http\Controllers;

use Illuminate\Routing\Controller;
use OhSeeSoftware\LaravelMarkdownContent\Facades\MarkdownContent;

class ShowArticleOgImageController extends Controller
{
    public function __invoke(string $type, string $slug)
    {
        $article = MarkdownContent::article()
            ->when($type, fn ($query) => $query->type($type))
            ->findOrFail($slug);

        return view(config('markdown-content.models.article.routes.og-image.view'), [
            'article' => $article,
        ]);
    }
}
