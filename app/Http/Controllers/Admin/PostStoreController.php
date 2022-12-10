<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;

class PostStoreController
{
    public function __invoke(Request $request)
    {
        Post::create([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'content_markdown' => $request->body,
        ]);

        return redirect()->route('admin.post.index');
    }
}
