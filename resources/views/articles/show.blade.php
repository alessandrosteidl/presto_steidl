<x-layout title="Scopri di più">
  <div class="container">
    <div class="row mt-3">
      <div class="col-12">
        <div class="d-flex flex-column flex-md-row mt-3">
          <div>
            <div class="swiper swiper-show"  style="width: 325px; height: 325px;">
              <!-- Additional required wrapper -->
              <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach ($article->images as $image)
                  <div class="swiper-slide"><img src="{{ Storage::url($image->path) }}" alt=""></div>
                @endforeach
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
            <h1 class="fs-2">{{ $article->title }}</h1>
            <p class="fs-3">{{ $article->price }} €</p>
            <a href="{{ route('articles.byCategory', [ 'category' => $article->category ]) }}">
              <h2>
                <span class="badge text-bg-secondary">{{ $article->category->name }}</span>
              </h2>
            </a>
            <p class="mt-3 fs-4">Created by {{ $article->user->name }} {{ $article->created_at->diffForHumans() }}</p>
          </div>
        </div>
        <div class="my-3">
          <p class="fs-4">{{ $article->description }}</p>
        </div>
      </div>
    </div>
    </div>
  </div>
</x-layout>