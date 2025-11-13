<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [QuestionController::class, 'index'])->name('home');
Route::resource('questions', QuestionController::class);

Route::middleware('auth')->group(function () {
    Route::post('/questions/{question}/answers', [AnswerController::class, 'store'])
        ->name('answers.store');
    Route::get('/answers/{answer}/edit', [AnswerController::class, 'edit'])
        ->name('answers.edit');
    Route::put('/answers/{answer}', [AnswerController::class, 'update'])
        ->name('answers.update');
    Route::delete('/answers/{answer}', [AnswerController::class, 'destroy'])
        ->name('answers.destroy');
});
