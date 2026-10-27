<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PageController::class, 'index'])->name('home');

Route::get('questions/{question}', [QuestionController::class, 'show'])->name('questions.show');

Route::get('blog', [BlogController::class, 'getPosts'])->name('blog');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
