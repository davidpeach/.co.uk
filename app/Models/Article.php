<?php

declare (strict_types=1);

namespace App\Models;

use App\Contracts\Streamable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Article extends Model implements Streamable
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
    ];

    public function meta(): MorphOne
    {
        return $this->morphOne(related: StreamItem::class, name: 'streamable');
    }

    public function images(): MorphToMany
    {
        return $this->morphToMany(related: Image::class, name: 'imageable');
    }
}
