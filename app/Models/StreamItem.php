<?php

declare (strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class StreamItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'published_at',
        'streamable_id',
        'streamable_type',
    ];

    public function streamable(): MorphTo
    {
        return $this->morphTo();
    }
}
