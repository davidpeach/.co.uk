<?php

use App\Http\Controllers\Admin\Notes\CreateController;
use App\Http\Controllers\Admin\Notes\StoreController;
use App\Models\Image;
use App\Models\Note;
use App\Models\StreamItem;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Spatie\PestPluginTestTime\testTime;

it('can display a list of note posts', function () {
    Note::factory()
        ->times(3)
        ->sequence(
            ['content' => 'first notes post'],
            ['content' => 'second notes post'],
            ['content' => 'third notes post'],
        )
        ->create();

    $response = get('/notes');

    $response->assertStatus(200);
    $response->assertViewIs('notes.index');
    $response->assertViewHas('notes', Note::all());
});

it('can display a single note', function () {
    $note = Note::factory()
    ->create(
        ['content' => 'My single notes post'],
    );

    $response = get('/notes/' . $note->getKey());

    $response->assertStatus(200);
    $response->assertViewIs('notes.show');
    $response->assertViewHas('streamable', Note::first());
});

it('can be created correctly using the current date and time as published date', function () {
    testTime()->freeze('2020-12-25 13:30:45');

    actingAs(User::factory()->create())->post(action(StoreController::class), [
        'content' => 'I have posted this in a test',
    ]);

    assertDatabaseHas(Note::class, [
        'content' => 'I have posted this in a test',
    ]);

    assertDatabaseHas(StreamItem::class, [
        'created_at' => Carbon::now(),
        'published_at' => Carbon::now(),
    ]);
});

it('can be created correctly using a specific publish date', function () {
    testTime()->freeze('2020-12-25 13:30:45');

    actingAs(User::factory()->create())->post(action(StoreController::class), [
        'content' => 'I have posted this in a test',
        'published_at' => '2022-01-15 20:30:45',
    ]);

    assertDatabaseHas(Note::class, [
        'content' => 'I have posted this in a test',
    ]);

    assertDatabaseHas(StreamItem::class, [
        'created_at' => Carbon::now(),
        'published_at' => '2022-01-15 20:30:45',
    ]);
});

it('can be created with an image attached', function () {
    testTime()->freeze('2020-12-25 13:30:45');

    Storage::fake('local');

    $file = UploadedFile::fake()->image('testing.jpg');

    actingAs(User::factory()->create())->post(action(StoreController::class), [
        'content' => 'I have posted this in a test',
        'published_at' => '2022-01-15 20:30:45',
        'image' => $file,
    ]);

    assertDatabaseHas(Note::class, [
        'content' => 'I have posted this in a test',
    ]);

    assertDatabaseHas(Image::class, [
        'path' => $file->hashName(),
        'created_at' => Carbon::now(),
    ]);

    assertDatabaseHas(StreamItem::class, [
        'created_at' => Carbon::now(),
        'published_at' => '2022-01-15 20:30:45',
    ]);

    expect(Note::first()->images->contains(Image::first()))->toBeTrue();

    Storage::disk('local')->assertExists($file->hashName());
});

it('wont allow guests to create a note', function () {
    post(action(StoreController::class))->assertRedirectToRoute('login');
});

it('can render the notes create form page', function () {
    actingAs(User::factory()->create())
    ->get(action(CreateController::class))
    ->assertStatus(200);
});
