<?php

use App\Models\Article;
use App\Models\Note;
use App\Models\StreamItem;
use function Pest\Laravel\get;

it('can list all of the stream items', function () {
    Note::factory()->create(['content' => 'My first note']);
    Note::factory()->create(['content' => 'My second note']);

    $response = $this->get('/stream');

    $response->assertStatus(200);
    $response->assertViewIs('stream.index');
    $response->assertViewHas('posts', StreamItem::all());
});

it('uses stream id for finding all post types', function () {
    [$noteA, $noteB] = Note::factory()->times(2)->create();
    [$articleA, $articleB] = Article::factory()->times(2)->create();

    get('/notes/' . $noteA->meta->id)->assertStatus(200);
    get('/notes/' . $noteB->meta->id)->assertStatus(200);
    get('/articles/' . $noteA->meta->id)->assertStatus(404);
    get('/articles/' . $noteB->meta->id)->assertStatus(404);

    get('/notes/' . $articleA->meta->id)->assertStatus(404);
    get('/notes/' . $articleB->meta->id)->assertStatus(404);
    get('/articles/' . $articleA->meta->id)->assertStatus(200);
    get('/articles/' . $articleA->meta->id)->assertStatus(200);
});
