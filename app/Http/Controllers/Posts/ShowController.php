<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\StreamItem;
use Illuminate\View\View;

class ShowController extends Controller
{
    public function __invoke(string $postType, StreamItem $stream): View
    {
        if ($postType !== $stream->streamable->getTable()) {
            abort(404);
        }
        return view($stream->streamable->getTable() . '.show', [
            'streamable' => $stream->streamable,
        ]);
    }
}
