<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;

class PostCreateController
{
    public function __invoke()
    {
        return Inertia::render('Posts/Create');
    }
}
