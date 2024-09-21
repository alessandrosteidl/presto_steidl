<div class="card mx-auto article-card border-1 p-2">
  <img src="{{ Storage::url($article->images->first()->path) }}" class="card-img-top rounded" alt="Immagine dell'articolo {{ $article->title }}">
  <div class="card-body px-1">
    <h5 class="card-title text-dark text-truncate">{{ $article->title }}</h5>
    <h6 class="card-subtitle text-dark mb-1">By {{ $article->user->name }}</h6>
    <h6 class="card-subtitle text-dark">{{ $article->price }} €</h6>
    <div class="d-flex my-2">
      <a href="{{ route('articles.byCategory', [ 'category' => $article->category ]) }}"><span class="card-text badge text-bg-secondary">{{ $article->category->name }}</span></a>
    </div>
    <a href="{{ route('articles.show', compact('article')) }}" class="text-decoration-none">Scopri di più ></a>
  </div>
</div>
