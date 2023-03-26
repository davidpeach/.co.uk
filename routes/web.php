<?php

declare (strict_types=1);

use App\Http\Controllers\Posts\Articles\IndexController as ArticleIndexController;
use App\Http\Controllers\Posts\Notes\IndexController as NotesIndexController;
use App\Http\Controllers\Posts\Stream\IndexController as StreamIndexController;
use App\Http\Controllers\Posts\ShowController;
use App\Models\StreamItem;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        'streamables' => StreamItem::all(),
    ]);
});

Route::get('articles', ArticleIndexController::class);
Route::get('notes', NotesIndexController::class);
Route::get('stream', StreamIndexController::class);

Route::get('{post_type}/{streamable}', ShowController::class);

