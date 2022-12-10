<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Inertia\Inertia;

class PostIndexController
{
    public function __invoke()
    {
        return Inertia::render('Posts/Index', [
            'posts' => Post::all(),
        ]);
    }
}
