<?php

namespace OhSeeSoftware\LaravelMarkdownContent\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class MakeArticleCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:article {type} {slug}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scaffolds out a new article.';

    protected function getStub()
    {
        return realpath(__DIR__ . '/../../stubs/article.stub');
    }

    public function handle()
    {
        $slug = trim($this->argument('slug'));
        $type = trim($this->argument('type'));

        $path = base_path("content/articles/{$slug}.md");

        if ($this->files->exists($path)) {
            $this->error("{$slug} already exists!");

            return false;
        }

        $stub = $this->files->get($this->getStub());
        $stub = Str::of($stub)
            ->replace("\nslug:", "\nslug: {$slug}")
            ->replace("\ntype:", "\ntype: {$type}")
            ->replace('title:', "title: '".Str::of($slug)->title()->replace('-', ' ')."'")
            ->replace('updated_at:', 'updated_at: '.now()->format('Y-m-d'))
            ->replace('created_at:', 'created_at: '.now()->format('Y-m-d'));

        $this->files->put($path, $stub);
    }
}
