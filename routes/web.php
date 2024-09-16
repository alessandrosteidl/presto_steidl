<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;

Route::get('/', [ PublicController::class, 'homepage' ])->name('homepage');
Route::get('/articles/create', [ ArticleController::class, 'create' ])->name('articles.create');