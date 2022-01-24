<?php

namespace OhSeeSoftware\LaravelMarkdownContent\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use OhSeeSoftware\LaravelMarkdownContent\Services\MarkdownService;
use Orbit\Concerns\Orbital;

class Article extends Model
{
    use Orbital;
    
    public $guarded = [];

    public function getKeyName()
    {
        return 'slug';
    }

    public function getIncrementing()
    {
        return false;
    }

    protected static function booted()
    {
        static::addGlobalScope('published', function (Builder $builder) {
            $builder->where(function ($query) {
                $query->whereNull('draft')->orWhere('draft', '0');
            });
        });
    }

    public static function schema(Blueprint $table)
    {
        $table->string('slug');
        $table->string('type');
        $table->string('title');
        $table->longText('content');
        $table->text('description')->nullable();
        $table->text('excerpt')->nullable();
        $table->string('keywords')->nullable();
        $table->boolean('draft')->nullable()->default(false);
        $table->string('category_slug')->nullable();
    }

    public function getUrlAttribute()
    {
        $slug = $this->slug;
        if ($this->type) {
            $slug = "{$this->type}/{$slug}";
        }

        return url($slug);
    }

    public function getContentHtmlAttribute()
    {
        return MarkdownService::parseMarkdown($this->content);
    }

    public function getExcerptHtmlAttribute()
    {
        return MarkdownService::parseMarkdown($this->excerpt);
    }

    public function scopeType(Builder $query, string $type)
    {
        $query->where('type', $type);
    }

    public function scopeInCategory(Builder $query, $category)
    {
        $query->where('category_slug', $category);
    }

    public function isPost(): bool
    {
        return $this->type === 'post';
    }

    public function isPage(): bool
    {
        return $this->type === 'page';
    }

    public function isPublished(): bool
    {
        return !$this->draft;
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_slug');
    }
}
