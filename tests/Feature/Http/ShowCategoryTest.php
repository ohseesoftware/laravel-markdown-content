<?php

namespace OhSeeSoftware\LaravelMarkdownContent\Tests\Feature\Http;

use Illuminate\Support\Facades\Event;
use OhSeeSoftware\LaravelMarkdownContent\Events\RenderingCategory;
use OhSeeSoftware\LaravelMarkdownContent\Tests\TestCase;

class ShowCategoryTest extends TestCase
{
    /** @test */
    public function it_can_show_a_category()
    {
        // Given
        Event::fake();

        // When
        $this->get('/categories/test-category')
            ->assertStatus(200)
            ->assertSee('Test Category');

        // Then
        Event::assertDispatched(RenderingCategory::class, function ($event) {
            return $event->category->slug === 'test-category';
        });
    }
}
