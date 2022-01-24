<?php

namespace OhSeeSoftware\LaravelMarkdownContent\Http\Controllers;

use Illuminate\Routing\Controller;
use OhSeeSoftware\LaravelMarkdownContent\Facades\MarkdownContent;

class IndexCategoriesController extends Controller
{
    public function __invoke()
    {
        $categories = MarkdownContent::category()->get();

        return view(config('markdown-content.models.category.routes.index.view'), [
            'categories' => $categories
        ]);
    }
}
