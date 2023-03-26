<?php

declare (strict_types = 1);

use App\Http\Controllers\Admin\Articles\IndexController as ArticleIndexController;
use App\Http\Controllers\Admin\Articles\CreateController as ArticleCreateController;
use App\Http\Controllers\Admin\Articles\StoreController as ArticleStoreController;
use App\Http\Controllers\Admin\Articles\UpdateController as ArticlesUpdateController;
use App\Http\Controllers\Admin\Articles\EditController as ArticleEditController;
use App\Http\Controllers\Admin\Notes\IndexController as NoteIndexController;
use App\Http\Controllers\Admin\Notes\StoreController as NoteStoreController;
use App\Http\Controllers\Admin\Notes\UpdateController as NoteUpdateController;
use App\Http\Controllers\Admin\Notes\CreateController as NoteCreateController;
use App\Http\Controllers\Admin\Notes\EditController as NoteEditController;
use App\Http\Controllers\Admin\PostCreateController;
use App\Http\Controllers\Admin\PostEditController;
use App\Http\Controllers\Admin\PostIndexController;
use App\Http\Controllers\Admin\PostStoreController;
use App\Http\Controllers\Admin\PostUpdateController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/posts', PostIndexController::class)->name('admin.post.index');
    Route::get('/posts/create', PostCreateController::class)->name('admin.post.create');
    Route::get('/posts/{post}', PostEditController::class)->name('admin.post.edit');
    Route::post('/posts', PostStoreController::class)->name('admin.post.store');
    Route::patch('/posts/{post}', PostUpdateController::class)->name('admin.post.update');

    Route::get('/notes', NoteIndexController::class)->name('admin.note.index');
    Route::get('/notes/create', NoteCreateController::class)->name('admin.note.create');
    Route::get('/notes/{note}', NoteEditController::class)->name('admin.note.edit');
    Route::post('/notes', NoteStoreController::class)->name(name: 'admin.note.store');
    Route::patch('/notes/{note}', NoteUpdateController::class)->name(name: 'admin.note.update');

    Route::get('/articles', ArticleIndexController::class)->name('admin.article.index');
    Route::get('/articles/create', ArticleCreateController::class)->name('admin.article.create');
    Route::get('/articles/{article}', ArticleEditController::class)->name('admin.article.edit');
    Route::post('/articles', ArticleStoreController::class)->name(name: 'admin.article.store');
    // Route::patch('/articles/{article}', ArticleUpdateController::class)->name(name: 'admin.article.update');
});

require __DIR__.'/auth.php';

