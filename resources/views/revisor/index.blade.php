<x-layout title="Revisiona">
  <div class="container">
    @if (session('success'))
        <div class="alert alert-success text-center my-3">{{ session('success') }}</div>
    @endif
    <div class="row mt-5">
      <div class="col-12">
        <h2>Revisiona questo annuncio</h2>
      </div>
    </div>
    @if ($article_to_check)
      <div class="row mt-5">
        <div class="col-12">
          <div class="d-flex flex-column flex-md-row mt-3">
            <div>
              <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                  <!-- Slides -->
                  <div class="swiper-slide"><img src="http://picsum.photos/325" alt=""></div>
                  <div class="swiper-slide"><img src="http://picsum.photos/326" alt=""></div>
                  <div class="swiper-slide"><img src="http://picsum.photos/327" alt=""></div>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
              
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
              
                <!-- If we need scrollbar -->
                <div class="swiper-scrollbar"></div>
              </div>
            </div>
            <div class="p-3 ps-md-5">
              <h1 class="fs-2">{{ $article_to_check->title }}</h1>
              <p class="fs-3">{{ $article_to_check->price }} €</p>
              <a href="{{ route('articles.byCategory', [ 'category' => $article_to_check->category ]) }}">
                <h2>
                  <span class="badge bg-main text-dark">{{ $article_to_check->category->name }}</span>
                </h2>
              </a>
              <p class="mt-3 fs-4">Created by {{ $article_to_check->user->name }} {{ $article_to_check->created_at->diffForHumans() }}</p>
              <div class="d-flex">
                <form action="{{ route('articles.reject', [ 'article' => $article_to_check ]) }}" method="POST">
                  @csrf
                  @method('PATCH')
                  <button class="btn btn-danger me-2">Rifiuta</button>
                </form>
                <form action="{{ route('articles.accept', [ 'article' => $article_to_check ]) }}" method="POST">
                  @csrf
                  @method('PATCH')
                  <button class="btn btn-success">Accetta</button>
                </form>
              </div>
            </div>
          </div>
          <div class="my-3">
            <p class="fs-4">{{ $article_to_check->description }}</p>
          </div>
        </div>
      </div>
    @else
      <div class="row mt-5">
        <div class="col-12">
          <h2>Attualmente non sono presenti annunci da revisionare</h2>
        </div>
      </div>
    @endif
  </div>
</x-layout>