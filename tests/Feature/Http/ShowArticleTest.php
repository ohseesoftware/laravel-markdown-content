<?php

namespace OhSeeSoftware\LaravelMarkdownContent\Tests\Feature\Http;

use Illuminate\Support\Facades\Event;
use OhSeeSoftware\LaravelMarkdownContent\Events\RenderingArticle;
use OhSeeSoftware\LaravelMarkdownContent\Tests\TestCase;

class ShowArticleTest extends TestCase
{
    /** @test */
    public function it_can_show_an_article()
    {
        // Given
        Event::fake();

        // When
        $this->get('/post/published-article')
            ->assertStatus(200)
            ->assertSee('published-article')
            ->assertSee('<p>Hello world!</p>');

        // Then
        Event::assertDispatched(RenderingArticle::class, function ($event) {
            return $event->article->slug === 'published-article';
        });
    }
}
