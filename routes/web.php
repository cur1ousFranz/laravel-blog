<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteMapController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Questions\QuestionController;


Route::fallback(function () {
    return view('404');
});

Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/about', [UserController::class, 'about'])->name('about');
Route::get('/disclaimer', [UserController::class, 'disclaimer'])->name('disclaimer');
Route::get('/privacy', [UserController::class, 'privacy'])->name('privacy');

Route::get('/authentication', [UserController::class, 'show'])->name('login')->middleware('guest');
Route::post('/authenticate', [UserController::class, 'store'])->name('authenticate');

Route::group(['middleware' => 'auth'], function() {

    Route::get('/signout', [UserController::class, 'destroy'])->name('signout');

    Route::get('/question', [QuestionController::class, 'index'])->name('question-index');
    Route::post('/question', [QuestionController::class, 'store'])->name('question-create');
    Route::get('/question/edit/{question:slug}', [QuestionController::class, 'edit'])->name('question-edit');
    Route::put('/question/{question:slug}', [QuestionController::class, 'update'])->name('question-update');
    Route::put('/question/image/{question:slug}', [QuestionController::class, 'updateImage'])->name('question-image-update');
    
});
Route::get('/question/{question:slug}', [QuestionController::class, 'show'])->name('question-show');
Route::get('/question/tag/{tag}', [QuestionController::class, 'showQuestionsByTag'])->name('question-tag');
Route::post('/question/search', [QuestionController::class, 'searchQuestion'])->name('question-search');
Route::get('/category/{category}', [QuestionController::class, 'category'])->name('category');

Route::get('/sitemap.xml', [SiteMapController::class, 'index'])->name('sitemap');