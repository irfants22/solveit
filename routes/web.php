<?php

use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [QuestionController::class, 'index'])->name('home');
Route::resource('questions', QuestionController::class);