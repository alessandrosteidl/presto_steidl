<x-layout title="Homepage">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <div class="d-flex justify-content-end">
                    @auth
                        <a href="{{ route('articles.create') }}" class="btn btn-primary my-3">Inserisci un articolo</i></a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-layout>