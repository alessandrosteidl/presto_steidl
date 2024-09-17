<div class="card mx-auto article-card-width shadow">
  <img src="https://picsum.photos/300" class="card-img-top" alt="Immagine dell'articolo {{ $article->title }}">
  <div class="card-body bg-main text-dark">
    <h5 class="card-title text-truncate">{{ $article->title }}</h5>
    <h6 class="card-subtitle mb-1">By {{ $article->user->name }}</h6>
    <h6 class="card-subtitle">{{ $article->price }} €</h6>
    <div class="d-flex my-2">
      <a href="{{ route('articles.byCategory', [ 'category' => $article->category ]) }}"><span class="card-text badge text-bg-secondary">{{ $article->category->name }}</span></a>
    </div>
    <a href="{{ route('articles.show', compact('article')) }}" class="btn btn-dark">Scopri di più</a>
  </div>
</div>