<x-layout title="{{ __('ui.' . $category->name) }}">
  <div class="container">
    <div class="row align-items-center mt-3">
        <div class="col-12">
            <div class="d-flex justify-content-end">
                @auth
                    <a href="{{ route('articles.create') }}" class="btn btn-outline-dark mb-3">{{ __('ui.insertArticle') }}</i></a>
                @endauth
            </div>
            <h1 class="my-5 text-center">{{ __('ui.' . $category->name) }}</h1>
        </div>
        @forelse ($articles as $article)
            <div class="col-12 col-md-6 col-lg-4 col-xxl-3 mb-3">
                <x-article-card :article="$article" />
            </div>
        @empty
            <div class="col-12 mb-3">
                <h2 class="text-center fs-3">{{ __('ui.noInsertedArticles') }}</h2>
            </div>
        @endforelse
    </div>
</div>
<div class="d-flex justify-content-center">
  <div>
    {{ $articles->links() }}
  </div>
</div>
</x-layout>