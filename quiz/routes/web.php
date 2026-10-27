<?php

use App\Http\Controllers\AdminQuizController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

Route::get('/', [QuizController::class, 'index'])->name('quiz.index');
Route::get('/quiz', [QuizController::class, 'index']);
Route::post('/quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit');

// Trasy administracyjne chronione własnym middleware
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/quiz', [AdminQuizController::class, 'index'])->name('admin.quiz');
});

