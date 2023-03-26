<?php

use App\Http\Controllers\Admin\Articles\CreateController;
use App\Http\Controllers\Admin\Articles\StoreController;
use App\Models\Article;
use App\Models\Image;
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

it('can display a list of articles posts', function () {
    Article::factory()
        ->times(3)
        ->sequence(
            ['content' => 'first article post'],
            ['content' => 'second article post'],
            ['content' => 'third article post'],
        )
        ->create();

    $response = get('/articles');

    $response->assertStatus(200);
    $response->assertViewIs('articles.index');
    $response->assertViewHas('articles', Article::all());
});

it('can display a single article', function () {
    $article = Article::factory()
    ->create(
        ['content' => 'My single article post'],
    );

    $response = get('/articles/' . $article->getKey());

    $response->assertStatus(200);
    $response->assertViewIs('articles.show');
    $response->assertViewHas('streamable', Article::first());
});

it('can be created correctly using the current date and time as published date', function (
    ?string $title,
    string $content,
) {
    testTime()->freeze('2020-12-25 13:30:45');

    actingAs(User::factory()->create())->post(action(StoreController::class), compact('title', 'content'));

        assertDatabaseHas(Article::class, compact('title', 'content'));

    assertDatabaseHas(StreamItem::class, [
        'created_at' => Carbon::now(),
        'published_at' => Carbon::now(),
    ]);
})->with([
    [
        'title' => 'The Title',
        'content' => 'I have posted this in a test',
    ],
    [
        'title' => null,
        'content' => 'I have posted this in a test',
    ],
]);

it('can be created correctly using a specific publish date', function () {
    testTime()->freeze('2020-12-25 13:30:45');

    actingAs(User::factory()->create())->post(action(StoreController::class), [
        'content' => 'I have posted this in a test',
        'published_at' => '2022-01-15 20:30:45',
    ]);

    assertDatabaseHas(Article::class, [
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

    assertDatabaseHas(Article::class, [
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

    expect(Article::first()->images->contains(Image::first()))->toBeTrue();

    Storage::disk('local')->assertExists($file->hashName());
});

it('wont allow guests to create a article', function () {
    post(action(StoreController::class))->assertRedirectToRoute('login');
});

it('can render the articles create form page', function () {
    actingAs(User::factory()->create())
    ->get(action(CreateController::class))
    ->assertStatus(200);
});
