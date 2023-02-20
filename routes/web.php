<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Questions\QuestionController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/authenticate', [UserController::class, 'index'])->name('login')->middleware('guest');
Route::post('/authenticate', [UserController::class, 'store'])->name('authenticate');

Route::group(['middleware' => 'auth'], function() {

    Route::get('/signout', [UserController::class, 'destroy'])->name('signout');

    Route::get('/question', [QuestionController::class, 'index'])->name('question-index');
    Route::post('/question', [QuestionController::class, 'store'])->name('question-create');
    Route::get('/question/edit/{question:slug}', [QuestionController::class, 'edit'])->name('question-edit');
    Route::put('/question/edit/{question:slug}', [QuestionController::class, 'update'])->name('question-update');
});
Route::get('/question/{question:slug}', [QuestionController::class, 'show'])->name('question-show');
