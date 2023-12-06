<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }
}
