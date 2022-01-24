<?php

namespace OhSeeSoftware\LaravelMarkdownContent\Tests\Unit\Models;

use OhSeeSoftware\LaravelMarkdownContent\Models\Article;
use OhSeeSoftware\LaravelMarkdownContent\Tests\TestCase;

class ArticleTest extends TestCase
{
    /** @test */
    public function articles_can_be_published()
    {
        // Given
        $article = Article::find('published-article');

        // Then
        $this->assertTrue($article->isPublished());
        $this->assertCount(1, Article::get());
    }

    /** @test */
    public function articles_can_be_in_draft_status()
    {
        // Given
        $article = Article::find('draft-article');

        // Then
        $this->assertNull($article);
        $this->assertEquals('published-article', Article::get()->first()->slug);
    }

    /** @test */
    public function articles_can_belong_to_a_category()
    {
        // Given
        $article = Article::find('published-article');

        // Then
        $this->assertEquals('test-category', $article->category->slug);
    }
}
