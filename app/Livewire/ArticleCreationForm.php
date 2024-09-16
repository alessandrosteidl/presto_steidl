<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class ArticleCreationForm extends Component
{
    #[Validate('required|min:5')]
    public $title;
    #[Validate('required|min:10')]
    public $description;
    #[Validate('required|numeric')]
    public $price;
    #[Validate('required|exists:categories,id')]
    public $category;
    
    public $article;

    public function store()
    {
        $this->validate();

        Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            

            'category_id' => $this->category,
            'user_id' => Auth::user()->id
        ]);

        $this->reset();

        session()->flash('success', 'Articolo creato correttamente');
    }

    public function render()
    {
        return view('livewire.article-creation-form');
    }
}
