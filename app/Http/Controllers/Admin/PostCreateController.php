<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use Inertia\Response;

class PostCreateController
{
    public function __invoke(): Response
    {
        return Inertia::render('Posts/Create');
    }
}
