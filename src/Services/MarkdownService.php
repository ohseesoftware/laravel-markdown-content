<?php

namespace OhSeeSoftware\LaravelMarkdownContent\Services;

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\MarkdownConverter;

class MarkdownService
{
    public static function parseMarkdown(string $content)
    {
        $environment = new Environment(config('markdown-content.commonmark.environment', []));
        $environment->addExtension(new CommonMarkCoreExtension());

        $extensions = config('markdown-content.commonmark.extensions', []);
        foreach ($extensions as $extension) {
            $environment->addExtension($extension);
        }

        $commonMarkConverter = new MarkdownConverter($environment);

        return $commonMarkConverter->convert($content);
    }
}
