<div class="card border-0 bg-body-tertiary">
  <div class="row g-0">
    <div class="col-md-4 col-lg-3 col-xl-2">
      @if (count($article->images) > 0)
        <img src="{{ $article->images->first()->getUrl(325, 325) }}" class="rounded img-search-result" alt="...">
      @else
        <img src="{{ Storage::url('public/default/logo_default.jpg') }}" class="rounded img-search-result" alt="Logo di Presto.it">
      @endif
    </div>
    <div class="col-md-8 col-lg-9 col-xl-10">
      <div class="card-body px-0 p-xl-4">
        <h5 class="card-title text-truncate">{{ $article->title }}</h5>
        <p class="card-text text-truncate">{{ $article->description }}</p>
        <a href="{{ route('articles.show', compact('article')) }}" class="card-link text-decoration-none">{{ __('ui.findOutMore') }}</a>
      </div>
    </div>
  </div>
</div>