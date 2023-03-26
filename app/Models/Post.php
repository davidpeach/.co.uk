<?php

declare (strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'excerpt',
        'content_markdown',
    ];

    protected $appends = ['content'];

    public function getContentAttribute(): string
    {
        return app(\Spatie\LaravelMarkdown\MarkdownRenderer::class)->toHtml($this->attributes['content_markdown']);
    }

    public function getPermalinkAttribute(): string
    {
        return '/posts/'.$this->id;
    }
}
