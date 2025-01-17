<x-layout title="{{ __('ui.searchResults') }}">
  <div class="container">
    @if ($articles->count() == 0)
      <h2 class="ms-3 mt-5">{{ __('ui.noResults') }}</h2>
      <h2 class="ms-3">{{ __('ui.noResultsTip') }}</h2>
    @else
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 mt-5">
          <p class="fs-7 text-gray ps-1">{{ $articles->count() }} {{ __('ui.results') }}</p>
        </div>
      </div>
      <div class="row justify-content-center">
        @foreach ($articles as $article)
          <div class="col-12 col-md-8 mt-5 @if ($loop->last) mb-5 @endif">
            <x-search-result :article="$article" />
          </div>
        @endforeach
      </div>
    @endif
  </div>
</x-layout>