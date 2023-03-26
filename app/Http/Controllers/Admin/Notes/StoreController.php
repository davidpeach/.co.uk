<?php

declare (strict_types=1);

namespace App\Http\Controllers\Admin\Notes;

use App\Events\NoteCreated;
use App\Http\Controllers\Controller;
use App\Models\Note;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Event;

class StoreController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $note = Note::create([
            'content' => $request->get(key: 'content'),
        ]);

        Event::dispatch(
            event: new NoteCreated(
                streamable: $note,
                published_at: new Carbon(
                    $request->get(
                        key: 'published_at',
                        default: Carbon::now()->timestamp)
                ),
                uploads: Arr::wrap($request->file(
                    key: 'image',
                    default: null,
                )),
            ),
        );

        return redirect()->route('admin.note.index');
    }
}
