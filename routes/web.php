<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PageController::class, 'index'])->name('home');

Route::get('questions/{question}', [QuestionController::class, 'show'])->name('questions.show');

Route::get('questions', [QuestionController::class, 'index'])->name('questions.index');

Route::delete('questions/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');

Route::get('blog', [BlogController::class, 'getPosts'])->name('blog');

Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::post('answers/{question}', [AnswerController::class, 'store'])->name('answers.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__ . '/settings.php';
