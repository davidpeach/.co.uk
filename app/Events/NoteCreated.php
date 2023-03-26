<?php

namespace App\Events;

use App\Contracts\Streamable;
use Carbon\Carbon;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\UploadedFile;
use Illuminate\Queue\SerializesModels;

class NoteCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     * @param array<int, UploadedFile> $uploads
     *
     * @return void
     */
    public function __construct(
        public Streamable $streamable,
        public Carbon $published_at,
        public array $uploads,
    ) {
    }
}
