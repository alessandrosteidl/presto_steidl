<nav class="navbar navbar-expand-lg bg-main text-dark shadow navbar-height">
  <div class="container-fluid">
    <a class="navbar-brand ps-5" href="{{ route('homepage') }}">Presto.it</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav w-100">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('homepage') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('articles.index') }}">Tutti gli articoli</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorie
          </a>
          <ul class="dropdown-menu">
            @foreach ($categories as $category)
              <li>
                <a href="{{ route('articles.byCategory', compact('category')) }}" class="dropdown-item text-capitalize">{{ $category->name }}</a>
              </li>
              @if (!$loop->last)
                <hr class="dropdown-divider" />
              @endif
            @endforeach
          </ul>
        </li>
        <li class="nav-item mx-auto">
          <form class="d-flex" role="search" action="{{ route('articles.search') }}" method="GET">
            <input class="form-control me-2" type="search" name="query" placeholder="Cerca" aria-label="Search">
            <button class="btn btn-outline-dark" type="submit">Cerca</button>
          </form>
        </li>
        @auth
        @if (Auth::user()->is_revisor)
          <li class="nav-item">
            <a class="nav-link position-relative" aria-current="page" href="{{ route('revisor.index') }}">
              Area revisori
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ \App\Models\Article::countToBeRevised() }}
              </span>
            </a>
          </li>
        @endif
          <li class="nav-item dropdown ms-auto">
            <a class="nav-link dropdown-toggle pe-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Ciao, {{ Auth::user()->name }}!
            </a>
            <ul class="dropdown-menu">
              @if (!Auth::user()->is_revisor)
                <li>
                  <a href="{{ route('become.revisor') }}" class="dropdown-item">Diventa revisore</a>
                </li>
              @endif
              <li>
                <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Esci</a>
                <form action="{{ route('logout') }}" method="POST" class="d-none" id="form-logout">
                  @csrf
                </form>
              </li>
            </ul>
          </li>
        @else
          <li class="nav-item dropdown ms-auto">
            <a class="nav-link dropdown-toggle pe-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Ciao, utente!
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('login') }}">Accedi</a></li>
              <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
            </ul>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
