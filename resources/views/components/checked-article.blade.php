<div class="card mx-auto article-card">
  <div class="card-header text-center">
    @if ($article->is_accepted)
      {{ __('ui.accepted') }}
    @else
      {{ __('ui.rejected') }}
    @endif
  </div>
  <div class="p-2">
    @if (count($article->images) > 0)
      <img src="{{ $article->images->first()->getUrl(325, 325) }}" class="card-img-top rounded" alt="Immagine dell'articolo {{ $article->title }}">
    @else
      <img src="{{ Storage::url('public/default/logo_default.jpg') }}" class="card-img-top rounded" alt="Logo di Presto.it">
    @endif
    <div class="card-body px-1">
      <h5 class="card-title text-dark text-truncate">{{ $article->title }}</h5>
      <h6 class="card-subtitle text-dark mb-1">{{ __('ui.insertedBy') }} {{ $article->user->name }}</h6>
      <h6 class="card-subtitle text-dark">{{ $article->price }} €</h6>
      <div class="d-flex my-2">
        <a href="{{ route('articles.byCategory', [ 'category' => $article->category ]) }}"><span class="card-text badge text-bg-secondary">{{ __('ui.' . $article->category->name) }}</span></a>
      </div>
      <a href="{{ route('revisor.correct', [ 'article' => $article ]) }}" class="text-decoration-none">{{ __('ui.correct') }}</a>
    </div>
  </div>
</div>
