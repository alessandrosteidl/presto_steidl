<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage()
    {
        $articles = Article::where('is_accepted', true)->take(6)->orderBy('created_at', 'desc')->get();
        
        return view('welcome', compact('articles'));
    }
}
