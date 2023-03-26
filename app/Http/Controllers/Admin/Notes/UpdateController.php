<?php

declare (strict_types=1);

namespace App\Http\Controllers\Admin\Notes;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Request $request, Note $note): RedirectResponse
    {
        $note->update([
            'content' => $request->content,
        ]);

        return redirect()->route('admin.note.index');
    }
}

