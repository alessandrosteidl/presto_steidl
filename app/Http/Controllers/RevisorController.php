<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function review()
    {
        $article_to_check = Article::where('is_accepted', null)->orderBy('created_at')->first();
        $checked_articles = Article::where('is_accepted', '!=', null)->orderBy('created_at', 'desc')->paginate(12);
        $mode = 'review';

        return view('revisor.index', compact('article_to_check', 'checked_articles', 'mode'));
    }

    public function correct(Article $article)
    {
        $article_to_check = $article;
        $checked_articles = Article::where('is_accepted', '!=', null)->orderBy('created_at', 'desc')->paginate(12);
        $mode = 'correct';

        return view('revisor.index', compact('article_to_check', 'checked_articles', 'mode'));
    }

    public function accept(Article $article)
    {
        $article->setAccepted(true);
        $article->save();

        return redirect()->back()->with('success', 'Article successfully accepted');
    }

    public function reject(Article $article)
    {
        $article->setAccepted(false);
        $article->save();

        return redirect()->back()->with('success', 'Article successfully rejected');
    }

    public function becomeRevisor()
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));

        return redirect()->route('homepage')->with('success', 'You have successfully applied to become a reviewer');
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', [ 'email' => $user->email ]);

        return redirect()->back();
    }
}
