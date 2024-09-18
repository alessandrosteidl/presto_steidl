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
    public function index()
    {
        $article_to_check = Article::where('is_accepted', null)->first();

        return view('revisor.index', compact('article_to_check'));
    }

    public function accept(Article $article)
    {
        $article->setAccepted(true);
        $article->save();

        return redirect()->back()->with('success', 'Articolo accettato con successo');
    }

    public function reject(Article $article)
    {
        $article->setAccepted(false);
        $article->save();

        return redirect()->back()->with('success', 'Articolo rifiutato con successo');
    }

    public function becomeRevisor()
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));

        return redirect()->route('homepage')->with('success', 'Hai chiesto di diventare revisore con successo');
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', [ 'email' => $user->email ]);

        return redirect()->back();
    }
}
