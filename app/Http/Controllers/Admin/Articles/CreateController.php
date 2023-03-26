<?php

declare (strict_types=1);

namespace App\Http\Controllers\Admin\Articles;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class CreateController extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('Articles/Create');
    }
}

