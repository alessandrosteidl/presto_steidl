<x-layout title="Registrazione">
  <div class="container-fluid">
    <div class="row justify-content-center align-items-center">
      <div class="col-12 d-flex flex-column justify-content-center align-items-center vh-100-auth">
        <h1 class="fs-3 mb-4">Registrati!</h1>
        <form action="{{ route('register') }}" method="POST" class="form-width">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
            @error('name')
              <p class="text-red fst-italic fs-8">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
            @error('email')
              <p class="text-red fst-italic fs-8">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
            @error('password')
              <p class="text-red fst-italic fs-8">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password_confirmation" class="form-label">Conferma password</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
            @error('password_confirmation')
              <p class="text-red fst-italic fs-8">{{ $message }}</p>
            @enderror
          </div>
          <button type="submit" class="btn btn-dark">Registrati</button>
        </form>
      </div>
    </div>
  </div>
</x-layout>