<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ArticleController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth', only: [ 'create' ])
        ];
    }

    public function index()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(6);

        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function byCategory(Category $category)
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->where('category_id', '=', $category->id)->paginate(6);

        return view('articles.byCategory', compact('articles', 'category'));
    }
}
