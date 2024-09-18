<div class="card border-0">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://picsum.photos/130" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{ $article->title }}</h5>
        <p class="card-text text-truncate">{{ $article->description }}</p>
        <a href="{{ route('articles.show', compact('article')) }}" class="card-link text-decoration-none">Scopri di più ></a>
      </div>
    </div>
  </div>
</div>