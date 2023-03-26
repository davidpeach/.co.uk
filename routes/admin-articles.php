<?php

declare (strict_types=1);

use App\Http\Controllers\Admin\Articles\IndexController;
use App\Http\Controllers\Admin\Articles\CreateController;
use App\Http\Controllers\Admin\Articles\EditController;
use App\Http\Controllers\Admin\Articles\StoreController;
use App\Http\Controllers\Admin\Articles\UpdateController;
use Illuminate\Support\Facades\Route;

Route::get(uri: '/articles', action: IndexController::class)->name(name: 'admin.article.index');
Route::get(uri: '/articles/create', action: CreateController::class)->name(name: 'admin.article.create');
Route::get(uri: '/articles/{article}', action: EditController::class)->name(name: 'admin.article.edit');
Route::post(uri: '/articles', action: StoreController::class)->name(name: 'admin.article.store');
Route::patch(uri: '/articles/{article}', action: UpdateController::class)->name(name: 'admin.article.update');
