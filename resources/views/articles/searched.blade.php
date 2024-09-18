<x-layout title="Risultati della ricerca">
  <div class="container">
    @if ($articles->count() == 0)
      <h2 class="ms-3 mt-5">Purtroppo non abbiamo trovato risultati.</h2>
      <h2 class="ms-3">Prova con una nuova ricerca.</h2>
    @else
      @foreach ($articles as $article)
        <div class="row justify-content-center">
          <div class="col-12 col-md-8 mt-5">
            <x-search-result :article="$article" />
          </div>
        </div>
      @endforeach
    @endif
  </div>
</x-layout>