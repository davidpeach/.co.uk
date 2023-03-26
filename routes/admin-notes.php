<?php

declare (strict_types=1);

use App\Http\Controllers\Admin\Notes\IndexController;
use App\Http\Controllers\Admin\Notes\StoreController;
use App\Http\Controllers\Admin\Notes\UpdateController;
use App\Http\Controllers\Admin\Notes\CreateController;
use App\Http\Controllers\Admin\Notes\EditController;
use Illuminate\Support\Facades\Route;

Route::get(uri: '/notes', action: IndexController::class)->name(name: 'admin.note.index');
Route::get(uri: '/notes/create', action: CreateController::class)->name(name: 'admin.note.create');
Route::get(uri: '/notes/{note}', action: EditController::class)->name(name: 'admin.note.edit');
Route::post(uri: '/notes', action: StoreController::class)->name(name: 'admin.note.store');
Route::patch(uri: '/notes/{note}', action: UpdateController::class)->name(name: 'admin.note.update');
