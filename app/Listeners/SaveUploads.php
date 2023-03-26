<?php

declare (strict_types=1);

namespace App\Listeners;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class SaveUploads
{
    public function handle(object $event): void
    {
        collect($event->uploads)->each(callback: function ($upload) use ($event) {
            $path = Storage::put(path: '/', contents: $upload);
            $image = Image::create([
                'path' => $path,
            ]);
            $event->streamable->images()->attach($image->getKey());
        });
    }
}
