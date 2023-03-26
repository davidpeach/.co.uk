<?php

declare (strict_types=1);

namespace App\Http\Controllers\Admin\Notes;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Inertia\Inertia;
use Inertia\Response;

class IndexController extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('Notes/Index', [
            'notes' => Note::all(),
        ]);
    }
}
