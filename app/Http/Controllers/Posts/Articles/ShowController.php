<?php

declare (strict_types=1);

namespace App\Http\Controllers\Posts\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\View\View;

class ShowController extends Controller
{
    public function __invoke(Article $article): View
    {
        return view('articles.show', [
            'article' => $article,
        ]);
    }
}
