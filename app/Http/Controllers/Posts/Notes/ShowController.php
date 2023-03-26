<?php

declare (strict_types=1);

namespace App\Http\Controllers\Posts\Notes;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\View\View;

class ShowController extends Controller
{
    public function __invoke(Note $note): View
    {
        return view('notes.show', [
            'note' => $note,
        ]);
    }
}
