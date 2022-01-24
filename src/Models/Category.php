<?php

namespace OhSeeSoftware\LaravelMarkdownContent\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Orbit\Concerns\Orbital;

class Category extends Model
{
    use Orbital;

    protected $guarded = [];

    public static function schema(Blueprint $table)
    {
        $table->string('slug');
        $table->string('title');
    }

    public function getUrlAttribute()
    {
        return url(route('categories.show', $this));
    }

    public function getKeyName()
    {
        return 'slug';
    }

    public function getIncrementing()
    {
        return false;
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'category_slug', 'slug')->orderBy('created_at', 'desc');
    }
}
