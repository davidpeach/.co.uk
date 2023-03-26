<?php

declare (strict_types=1);

namespace App\Http\Controllers\Posts\Stream;

use App\Http\Controllers\Controller;
use App\Models\StreamItem;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        return view('stream.index', [
            'posts' => StreamItem::all(),
        ]);
    }
}
