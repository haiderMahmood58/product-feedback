<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FeedbackController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/feedback', [FeedbackController::class, 'view'])->name('feedback.view');
Route::post('/feedback', [FeedbackController::class, 'create'])->name('feedback.create');
