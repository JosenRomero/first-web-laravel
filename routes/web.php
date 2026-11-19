<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PageController::class, 'index'])->name('home');

Route::get('forum', [QuestionController::class, 'index'])->name('questions.index');

Route::get('forum/create', [QuestionController::class, 'create'])->name('questions.create')->middleware('auth');
Route::post('forum', [QuestionController::class, 'save'])->name('questions.save')->middleware('auth');

Route::get('forum/{question:slug}/edit', [QuestionController::class, 'edit'])->name('questions.edit')->middleware('auth');
Route::put('forum/{question}', [QuestionController::class, 'update'])
    ->name('questions.update')
    ->middleware('auth', 'can:update,question');

Route::get('forum/{question:slug}', [QuestionController::class, 'show'])->name('questions.show');
Route::delete('forum/{question}', [QuestionController::class, 'destroy'])
    ->name('questions.destroy')
    ->middleware('auth', 'can:delete,question');

Route::post('answers/{question}', [AnswerController::class, 'store'])->name('answers.store')->middleware('auth');



Route::get('blog', [BlogController::class, 'getPosts'])->name('blog');

Route::get('posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('posts', [PostController::class, 'save'])->name('posts.save')->middleware('auth');

Route::get('posts/{post:slug}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth');
Route::put('posts/{post}', [PostController::class, 'update'])
    ->name('posts.update')
    ->middleware('auth', 'can:update,post');

Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::delete('posts/{post}', [PostController::class, 'destroy'])
    ->name('posts.destroy')
    ->middleware('auth', 'can:delete,post');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__ . '/settings.php';
