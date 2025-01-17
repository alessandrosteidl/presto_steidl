<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

Route::get('/', [ PublicController::class, 'homepage' ])->name('homepage');
Route::get('/search/articles', [ PublicController::class, 'searchArticles' ])->name('articles.search');
Route::post('/language/{lang}', [ PublicController::class, 'setLanguage' ])->name('setLocale');

Route::get('/articles/index', [ ArticleController::class, 'index' ])->name('articles.index');
Route::get('/articles/create', [ ArticleController::class, 'create' ])->name('articles.create');
Route::get('/articles/show/{article}', [ ArticleController::class, 'show' ])->name('articles.show');
Route::get('/category/{category}', [ ArticleController::class, 'byCategory' ])->name('articles.byCategory');

Route::get('/revisor/review', [ RevisorController::class, 'review' ])->middleware('isRevisor')->name('revisor.review');
Route::get('/revisor/correct/{article}', [ RevisorController::class, 'correct' ])->middleware('isRevisor')->name('revisor.correct');
Route::patch('/accept/{article}', [ RevisorController::class, 'accept' ])->name('articles.accept');
Route::patch('/reject/{article}', [ RevisorController::class, 'reject' ])->name('articles.reject');
Route::get('/revisor/request', [ RevisorController::class, 'becomeRevisor' ])->middleware('auth')->name('become.revisor');
Route::get('/make/revisor/{user}', [ RevisorController::class, 'makeRevisor' ])->name('make.revisor');
