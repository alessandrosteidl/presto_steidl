<nav class="navbar navbar-expand-lg bg-main text-dark shadow">
  <div class="container-fluid">
    <a class="navbar-brand ps-5 display-font fs-2" href="{{ route('homepage') }}">Presto.it</a>
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
        @auth
          <li class="nav-item dropdown ms-auto">
            <a class="nav-link dropdown-toggle pe-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Ciao, {{ Auth::user()->name }}!
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="{{ route('articles.create') }}" class="dropdown-item">Inserisci un articolo</a>
              </li>
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
