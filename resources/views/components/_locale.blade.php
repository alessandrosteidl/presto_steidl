<form class="d-inline" action="{{ route('setLocale', $lang) }}" method="POST">
  @csrf
  <button type="submit" class="dropdown-item">
    <img src="{{ asset('vendor/blade-flags/language-' . $lang . '.svg') }}" width="25" height="25" class="me-1"/>
    {{ strtoupper($lang) }}
  </button>
</form>