<?php

namespace OhSeeSoftware\LaravelMarkdownContent\Tests\Feature\Http;

use OhSeeSoftware\LaravelMarkdownContent\Tests\TestCase;

class IndexArticleTest extends TestCase
{
    /** @test */
    public function it_can_index_articles_by_type()
    {
        $this->get('/post')
            ->assertStatus(200)
            ->assertSee('<h1>Published Article</h1>', false);
    }
}
