<x-layout title="{{ __('ui.reviewArticle') }}">
  <div class="container">
    @if (session('success'))
        <div class="alert alert-success text-center my-3">{{ session('success') }}</div>
    @endif
    @if ($article_to_check)
      <div class="row mt-5">
        <div class="col-12">
          <h2>{{ __('ui.review') }}</h2>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-12">
          <div class="d-flex flex-column flex-md-row mt-3">
            <div>
              <div class="swiper swiper-show border border-2 border-dark" style="width: 325px; height: 404.5px;">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                  <!-- Slides -->
                  @foreach ($article_to_check->images as $image)
                    <div class="swiper-slide">
                      <div class="d-flex w-100 pt-3">
                        <div class="w-20 mb-3">
                          <p class="fs-7 text-center text-dark mb-1">{{ __('ui.adult') }}</p>
                          <div class="text-center">
                            <i class="{{ $image->adult }}"></i>
                          </div>
                        </div>
                        <div class="w-20 mb-3">
                          <p class="fs-7 text-center text-dark mb-1">{{ __('ui.spoof') }}</p>
                          <div class="text-center">
                            <i class="{{ $image->spoof }}"></i>
                          </div>
                        </div>
                        <div class="w-20 mb-3">
                          <p class="fs-7 text-center text-dark mb-1">{{ __('ui.medical') }}</p>
                          <div class="text-center">
                            <i class="{{ $image->medical }}"></i>
                          </div>
                        </div>
                        <div class="w-20 mb-3">
                          <p class="fs-7 text-center text-dark mb-1">{{ __('ui.violence') }}</p>
                          <div class="text-center">
                            <i class="{{ $image->violence }}"></i>
                          </div>
                        </div>
                        <div class="w-20 mb-3">
                          <p class="fs-7 text-center text-dark mb-1">{{ __('ui.racy') }}</p>
                          <div class="text-center">
                            <i class="{{ $image->racy }}"></i>
                          </div>
                        </div>
                      </div>
                      <img src="{{ $image->getUrl(325, 325) }}" alt="">
                    </div>
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
              <h1 class="fs-2">{{ $article_to_check->title }}</h1>
              <p class="fs-3">{{ $article_to_check->price }} €</p>
              <a href="{{ route('articles.byCategory', [ 'category' => $article_to_check->category ]) }}">
                <h2>
                  <span class="badge text-bg-secondary">{{ __('ui.'. $article_to_check->category->name) }}</span>
                </h2>
              </a>
              <p class="mt-3 fs-4">{{ __('ui.insertedBy') }} {{ $article_to_check->user->name }} {{ $article_to_check->created_at->diffForHumans() }}</p>
              <div class="d-flex">
                <form action="{{ route('articles.reject', [ 'article' => $article_to_check ]) }}" method="POST">
                  @csrf
                  @method('PATCH')
                  <button class="btn btn-outline-danger me-2">{{ __('ui.reject') }}</button>
                </form>
                <form action="{{ route('articles.accept', [ 'article' => $article_to_check ]) }}" method="POST">
                  @csrf
                  @method('PATCH')
                  <button class="btn btn-outline-success">{{ __('ui.accept') }}</button>
                </form>
              </div>
              <div>
                <h5 class="fs-3 text-dark mt-3">Labels</h5>
                @if ($image->labels)
                  @foreach ($image->labels as $label)
                    <span>{{ $label }}</span>
                    @if (!$loop->last)
                      <span>, </span>
                    @endif
                  @endforeach
                @else
                  <h5>No labels</h5>
                @endif
              </div>
            </div>
          </div>
          <div class="p-3 p-md-0 my-3">
            <p class="fs-4">{{ $article_to_check->description }}</p>
          </div>
        </div>
      </div>
    @else
      <div class="row mt-5">
        <div class="col-12">
          <h2>{{ __('ui.noArticlesToReview') }}</h2>
        </div>
      </div>
    @endif
  </div>
</x-layout>
