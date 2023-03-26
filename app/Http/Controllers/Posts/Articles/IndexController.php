<?php

declare (strict_types=1);

namespace App\Http\Controllers\Posts\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        return view('articles.index', [
            'articles' => Article::all(),
        ]);
    }
}
