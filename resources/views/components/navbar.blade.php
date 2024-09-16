<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('homepage') }}">Presto.it</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('homepage') }}">Home</a>
        </li>
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
