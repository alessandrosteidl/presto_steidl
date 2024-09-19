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
                        <a href="{{ route('articles.create') }}" class="btn btn-outline-dark mb-3">Inserisci un articolo</a>
                    @endauth
                </div>
                <h1 class="my-5 text-center">I nostri articoli più recenti</h1>
            </div>
            @if ($articles->count() > 0)
                <div class="swiper swiper-welcome-xxl d-none d-xxl-block">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach ($articles as $article)
                            <div class="swiper-slide">
                                <div class="col-12 mb-5">
                                    <x-article-card :article="$article" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                
                    <!-- If we need scrollbar -->
                    <div class="swiper-scrollbar"></div>
                </div>
                <div class="swiper swiper-welcome-lg d-none d-lg-block d-xxl-none">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach ($articles as $article)
                            <div class="swiper-slide">
                                <div class="col-12 mb-5">
                                    <x-article-card :article="$article" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                
                    <!-- If we need scrollbar -->
                    <div class="swiper-scrollbar"></div>
                </div>
                <div class="swiper swiper-welcome-md d-none d-md-block d-lg-none">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach ($articles as $article)
                            <div class="swiper-slide">
                                <div class="col-12 mb-5">
                                    <x-article-card :article="$article" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                
                    <!-- If we need scrollbar -->
                    <div class="swiper-scrollbar"></div>
                </div>
                <div class="swiper swiper-welcome d-md-none">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach ($articles as $article)
                            <div class="swiper-slide">
                                <div class="col-12 mb-5">
                                    <x-article-card :article="$article" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                
                    <!-- If we need scrollbar -->
                    <div class="swiper-scrollbar"></div>
                </div>
            @else
                <div class="col-12 mb-3">
                    <h2 class="text-center fs-3">Non sono ancora stati creati articoli</h2>
                </div>
            @endif
        </div>
    </div>
</x-layout>