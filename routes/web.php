<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('categories', CategoryController::class)->middleware('auth');

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
