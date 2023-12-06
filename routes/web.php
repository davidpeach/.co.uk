<?php

use App\Http\Controllers\Admin\PostCreateController;
use App\Http\Controllers\Admin\PostEditController;
use App\Http\Controllers\Admin\PostIndexController;
use App\Http\Controllers\Admin\PostStoreController;
use App\Http\Controllers\Admin\PostUpdateController;
use App\Http\Controllers\Posts\ShowController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
        'posts' => Post::all(),
    ]);
});

Route::get('posts/{post}', ShowController::class);

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
});

require __DIR__.'/auth.php';
