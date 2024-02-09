<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FeedbackController;

Auth::routes();

Route::get('/', [FeedbackController::class, 'index'])->name('feedback.index');
Route::get('/feedback', [FeedbackController::class, 'new'])->name('feedback.new');
Route::post('/feedback', [FeedbackController::class, 'create'])->name('feedback.create');
