<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostUpdateController extends Controller
{
    public function __invoke(Request $request, Post $post)
    {
        $post->update([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'content_markdown' => $request->body,
        ]);

        return redirect()->route('admin.post.index');
    }
}
