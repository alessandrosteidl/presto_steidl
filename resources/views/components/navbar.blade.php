<nav class="navbar navbar-expand-lg bg-body-tertiary text-dark navbar-height">
  <div class="container-fluid">
    <a class="navbar-brand ps-lg-5" href="{{ route('homepage') }}">Presto.it</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav w-100">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('homepage') }}">{{ __('ui.home') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('articles.index') }}">{{ __('ui.articles') }}</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ __('ui.categories') }}
          </a>
          <ul class="dropdown-menu">
            @foreach ($categories as $category)
              <li>
                <a href="{{ route('articles.byCategory', compact('category')) }}" class="dropdown-item">{{ __('ui.' . $category->name) }}</a>
              </li>
              @if (!$loop->last)
                <hr class="dropdown-divider" />
              @endif
            @endforeach
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle pe-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ __('ui.languages') }}
          </a>
          <ul class="dropdown-menu">
            <li>
              <x-_locale lang="it" />
            </li>
            <hr class="dropdown-divider" />
            <li>
              <x-_locale lang="en" />
            </li>
            <hr class="dropdown-divider" />
            <li>
              <x-_locale lang="de" />
            </li>
          </ul>
        </li>
        <li class="nav-item mx-lg-auto">
          <form class="d-flex" role="search" action="{{ route('articles.search') }}" method="GET">
            <input class="form-control me-2 search-width" type="search" name="query" placeholder="{{ __('ui.search') }}" aria-label="Search">
            <button class="btn btn-outline-dark" type="submit">{{ __('ui.search') }}</button>
          </form>
        </li>
        @auth
          <li class="nav-item dropdown ms-lg-auto">
            <a class="nav-link dropdown-toggle pe-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ __('ui.hi') }}, {{ Auth::user()->name }}!
            </a>
            <ul class="dropdown-menu">
              @if (Auth::user()->is_revisor)
                <li class="nav-item">
                  <a class="dropdown-item" href="{{ route('revisor.review') }}">
                    {{ __('ui.revisorsArea') }}
                    <span class="badge rounded-pill bg-dark">
                      {{ \App\Models\Article::countToBeRevised() }}
                    </span>
                  </a>
                </li>
              @else
                <li>
                  <a href="{{ route('become.revisor') }}" class="dropdown-item">{{ __('ui.becomeRevisor') }}</a>
                </li>
              @endif
              <hr class="dropdown-divider" />
              <li>
                <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">{{ __('ui.exit') }}</a>
                <form action="{{ route('logout') }}" method="POST" class="d-none" id="form-logout">
                  @csrf
                </form>
              </li>
            </ul>
          </li>
        @else
          <li class="nav-item dropdown ms-lg-auto">
            <a class="nav-link dropdown-toggle pe-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ __('ui.hi') }}, {{ __('ui.user') }}!
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('login') }}">{{ __('ui.login') }}</a></li>
              <hr class="dropdown-divider" />
              <li><a class="dropdown-item" href="{{ route('register') }}">{{ __('ui.register') }}</a></li>
            </ul>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
