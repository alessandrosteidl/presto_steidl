<x-layout title="Homepage">
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success text-center my-3">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger text-center my-3">{{ session('error') }}</div>
        @endif
        <div class="row align-items-center mt-3">
            <div class="col-12">
                <div class="d-flex justify-content-end">
                    @auth
                        <a href="{{ route('articles.create') }}" class="btn btn-dark mb-3">Inserisci un articolo</i></a>
                    @endauth
                </div>
            </div>
            @forelse ($articles as $article)
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <x-article-card :article="$article" />
                </div>
            @empty
                <div class="col-12 mb-3">
                    <h2 class="text-center fs-3">Non sono ancora stati creati articoli</h2>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>