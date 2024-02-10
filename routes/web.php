<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\CommentController;

Route::middleware('auth')->group(function () {
    Route::get('/', [FeedbackController::class, 'index'])->name('feedback.index');
    Route::get('/feedback', [FeedbackController::class, 'new'])->name('feedback.new');
    Route::post('/feedback', [FeedbackController::class, 'create'])->name('feedback.create');
    Route::post('/comments', [CommentController::class, 'create'])->name('comment.create');
});

Auth::routes();
