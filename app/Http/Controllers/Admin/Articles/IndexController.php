<?php

declare (strict_types=1);

namespace App\Http\Controllers\Admin\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Inertia\Inertia;
use Inertia\Response;

class IndexController extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('Articles/Index', [
            'articles' => Article::all(),
        ]);
    }
}

