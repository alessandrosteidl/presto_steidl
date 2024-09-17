<x-layout title="Indice degli articoli">
    <div class="container-fluid">
        <div class="row align-items-center mt-3">
            <div class="col-12">
                <div class="d-flex justify-content-end">
                    @auth
                        <a href="{{ route('articles.create') }}" class="btn btn-dark mb-3">Inserisci un articolo</i></a>
                    @endauth
                </div>
            </div>
            @forelse ($articles as $article)
                <div class="col-12 col-lg-4 mb-3">
                    <x-article-card :article="$article" />
                </div>
            @empty
                <div class="col-12 mb-3">
                    <h2 class="text-center fs-3">Non sono ancora stati creati articoli</h2>
                </div>
            @endforelse
        </div>
    </div>
    <div class="d-flex justify-content-center">
      <div class="text-dark">
        {{ $articles->links() }}
      </div>
    </div>
</x-layout>
