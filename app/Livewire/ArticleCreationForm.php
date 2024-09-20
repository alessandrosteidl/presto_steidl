<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class ArticleCreationForm extends Component
{
    use WithFileUploads;

    #[Validate('required|min:5')]
    public $title;
    #[Validate('required|min:10')]
    public $description;
    #[Validate('required|numeric')]
    public $price;
    #[Validate('required|exists:categories,id')]
    public $category;
    public $images = [];
    public $temporary_images;
    
    public $article;

    public function store()
    {
        $this->validate();

        $this->article = Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            

            'category_id' => $this->category,
            'user_id' => Auth::user()->id
        ]);

        if (count($this->images) > 0)
        {
            foreach ($this->images as $image)
            {
                $this->article->images()->create([ 'path' => $image->store('images', 'public') ]);
            }
        }

        $this->reset();

        session()->flash('success', 'Articolo creato correttamente');
    }

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'image|max:1024',
            'temporary_images' => 'min:1|max:6'
        ]));

        foreach ($this->temporary_images as $image)
        {
            $this->images[] = $image;
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images)))
        {
            unset($this->images[$key]);
        }
    }

    public function render()
    {
        return view('livewire.article-creation-form');
    }
}
