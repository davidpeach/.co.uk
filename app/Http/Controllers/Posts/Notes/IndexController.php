<?php

declare (strict_types=1);

namespace App\Http\Controllers\Posts\Notes;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        return view('notes.index', [
            'notes' => Note::all(),
        ]);
    }
}
