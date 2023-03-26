<?php

declare (strict_types=1);

namespace App\Http\Controllers\Admin\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Request $request, Article $article): RedirectResponse
    {
        $article->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('admin.article.index');
    }
}


