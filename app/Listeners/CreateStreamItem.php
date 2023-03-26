<?php

declare (strict_types=1);

namespace App\Listeners;

use App\Models\StreamItem;

class CreateStreamItem
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function handle(object $event): void
    {
        StreamItem::create([
            'published_at' => $event->published_at,
            'streamable_id' => $event->streamable->getKey(),
            'streamable_type' => get_class(object: $event->streamable),
        ]);
    }
}
