<?php

namespace OhSeeSoftware\LaravelMarkdownContent\Http\Controllers;

use Illuminate\Routing\Controller;
use OhSeeSoftware\LaravelMarkdownContent\Events\RenderingCategory;
use OhSeeSoftware\LaravelMarkdownContent\Facades\MarkdownContent;

class ShowCategoryController extends Controller
{
    public function __invoke(string $slug)
    {
        $category = MarkdownContent::category()->findOrFail($slug);

        event(new RenderingCategory($category));

        return view(config('markdown-content.models.category.routes.show.view'), [
            'category' => $category
        ]);
    }
}
